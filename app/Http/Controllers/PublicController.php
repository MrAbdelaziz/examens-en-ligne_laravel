<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Input;
use Carbon\Carbon;
use Auth;
use App\Categorie;
use App\Subcategorie;
use App\Exam;
use App\User;
use App\Examination;
use App\Question;
use App\Answer;

class PublicController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $categories=Categorie::get();
        foreach ($categories as $cat){
            $subcategories[$cat->name]=Subcategorie::where('parent', $cat->id)->get();
        }
        $exams=Exam::where('is_completed_writing','1')->where('status','1')->latest('updated_at')->take(3)->get();
        foreach ($exams as $exam){
            $exam->author=self::getauthorname($exam->author);
        }
        $authors=User::where('status','1')->where('role_id','3')->latest('updated_at')->take(4)->get();
        return view('welcome', compact('categories','subcategories','exams','authors'));
    }
    public function  categories(){
        $categories=Categorie::get();
        $subcategories=Subcategorie::get();
        $exams=Exam::where('is_completed_writing','1')->where('status','1')->latest('updated_at')->get();
        return view('categories',compact('categories','subcategories','exams'));
    }
    public function search(){
        $tag=Input::get('tag');
        $cat=Input::get('cat');
        $subcateg=null;
        $exams=[];
        if(!empty($cat) && is_numeric($cat)){
            $subcateg=self::getsubcategoriesid($cat);
        }
        if(!empty($cat) && is_string($cat)){
            $subcateg=self::getsubcategories($cat);
        }

        if(!empty($tag) && empty($subcateg)){
            $exams=Exam::where('is_completed_writing','1')->where('status','1')->where('tags', 'like', '%' . $tag . '%')->latest('updated_at')->get();
        }
        if(!empty($tag) && !empty($subcateg)){
            $exams=Exam::where('is_completed_writing','1')->where('status','1')->where('tags', 'like', '%' . $tag . '%')->wherein('subcategory', $subcateg)->latest('updated_at')->get();
        }
        if(empty($tag) && empty($cat)){
            $exams=Exam::where('is_completed_writing','1')->where('status','1')->latest('updated_at')->get();
        }
        return view('search',compact('exams','tag','cat','categ'));
    }
    public function  category($id){
        $catid=$id;
        $categories=Categorie::get();
        $subcategories=Subcategorie::where('parent', $id)->get();
        $i=0; $arr=[];
        foreach($subcategories as $subcat) {
            $arr[$i]=$subcat->id; $i++;
        }
        $exams=Exam::where('is_completed_writing','1')->where('status','1')->whereIn('subcategory', $arr)->latest('updated_at')->get();
        return view('category',compact('categories','subcategories','exams','catid'));
    }
    public function exampage($id){
        if (Exam::where('id', $id)->where('is_completed_writing', '1')->where('status', '1')->exists()) {
            $exams=Exam::where('is_completed_writing','1')->where('status','1')->where('id', $id)->get();
        }else {
            abort(404);
        }
        return view('singleexam',compact('exams'));
    }
    public function pass(Request $request){
        // exam
        if (Exam::where('id', $request['id'])->where('is_completed_writing', '1')->where('status', '1')->exists()) {
            $exams=Exam::where('is_completed_writing','1')->where('status','1')->where('id', $request['id'])->get();
        }else {
            abort(404);
        }
        // questions
        $content = [];
        $questions = Question::where('exam_of_question', $request['id'])->orderBy('question_order', 'asc')->get();
        $i=0;
        foreach ($questions as $quest) {
            $content['questions'][$i] = ['id'=>$quest->id, 'content_area_one'=>$quest->content_area_one, 'content_area_two'=>$quest->content_area_two, 'nbr_answers'=>$quest->nbr_answers, 'exam_of_question'=>$quest->exam_of_question];
            $i++;
        }
        // answers
        foreach ($content['questions'] as $nbrquest => $quest) {
            $answers = Answer::where('question_of_answer', $quest['id'])->orderBy('answers_order', 'asc')->get();
            foreach ($answers as $key => $ansr) {
                $content['answers'][$nbrquest][$key] = ['id'=>$ansr->id,'content'=>$ansr->content,'is_correct_answer'=>$ansr->is_correct_answer,'question_of_answer'=>$ansr->question_of_answer,];
            }
        }
        $current = Carbon::now();
        $data=['start_date'=>$current,'certification_status'=>2];
        DB::table('examinations')->where('exam_id', $request['id'])->where('user_id', Auth::id())->update($data);
        return view('exampass',compact('exams','content'));
    }
    public static function getNbrCorrectAnswers($QuestionId) {
        return Answer::where(['question_of_answer'=>$QuestionId, 'is_correct_answer'=>'1'])->count();
    }
    public function send(Request $request) {
        //dd($request);
        $nbranswers=0;
        $nbrincorrectanswers=0;
        $cmp=1;
        while($request['q_' . $cmp]){
            if(is_array($request['q_' . $cmp])){
                // multi responces
                foreach($request['q_' . $cmp] as $qst){
                    $resp=explode('.', $qst);
                    if($resp==33){
                        $nbrincorrectanswers++;
                        $nbranswers++;
                    }else{
                        $nbranswers++;
                    }
                }
            }else{
                // single responce
                if($request['q_' . $cmp]==33){
                    $nbrincorrectanswers++;
                    $nbranswers++;
                }else{
                    $nbranswers++;
                }
            }
            $cmp++;
        }
        // score
        if($nbranswers!=0){
            $percentageincorrect=($nbrincorrectanswers/$nbranswers)*100;
            $percentagecorrect=100-$percentageincorrect;
            $percentageincorrect=number_format((float)$percentageincorrect, 2, '.', '');
            $percentagecorrect=number_format((float)$percentagecorrect, 2, '.', '');
        }else{
            $percentageincorrect=100;
            $percentagecorrect=0;
        }
        $current = Carbon::now();
        $data=['nbr_incorrect_answers'=>$nbrincorrectanswers,'end_date'=>$current,'score'=>$percentagecorrect];
        DB::table('examinations')->where('exam_id', $request['examid'])->where('user_id', Auth::id())->update($data);
        return redirect()->route('exam',$request['id'])->withStatus('');
    }
    public function  about() {
        return view('about');
    }
    public function  contact() {
        return view('contact');
    }
    public function registertoexam(Request $request) {
        // dd($request);
        $examination = new Examination();
        $examination->user_id = $request['user'];
        $examination->exam_id = $request['id'];
        $current = Carbon::now();
        $examination->possible_start_exam_date = $current;
        $expires = $current->addDays(30);
        $examination->limit_start_exam_date = $expires;
        $examination->save();
        return redirect()->route('exam',$request['id'])->withStatus('Congratulation, you got 50% in the exam !!');
    }
    public static function GetExaminationStatus($user,$exam) {
        $items = Examination::where('user_id','=',$user)->where('exam_id','=',$exam)->first();
        if($items == null){
            return "Unregistered";
        }elseif($items != null && $items->registration_status == 1 && $items->limit_start_exam_date >= Carbon::now() && $items->certification_status == null){
            return "RegisteredAccepted";
        }elseif($items != null && $items->registration_status == 2){
            return "RegisteredPendding";
        }elseif($items != null && $items->registration_status == 3){
            return "RegisteredRejected";
        }elseif($items != null && $items->registration_status == 1 && $items->start_date != null && $items->certification_status == 1){
            return "RegisteredAndPassedAndCertified";
        }elseif($items != null && $items->registration_status == 1 && $items->start_date != null && $items->certification_status == 3){
            return "RegisteredAndPassedAndNotCertified";
        }elseif($items != null && $items->registration_status == 1 && $items->start_date != null && $items->certification_status == 2){
            return "RegisteredAndPassedAndPenddingCertif";
        }else{
            return "RegisteredOutOfTime";
        }
    }
    public function getauthorname($id){
        $user=User::where('id', $id)->first();
        return $user->name;
    }
    public static function getcategoryname($id){
        $category=Categorie::where('id', $id)->first();
        return $category->name;
    }
    public function getsubcategories($categoryname){
        $categorie=Categorie::where('name',$categoryname)->first();
        $subcategories=Subcategorie::where('parent',$categorie['id'])->get();
        $subcategoriesarray=[];
        $i=0;
        foreach($subcategories as $subcat){
            $subcategoriesarray[$i]=$subcat->id;
            $i++;
        }
        return $subcategoriesarray;
    }
    public function getsubcategoriesid($categoryid){
        $categorie=Subcategorie::where('id',$categoryid)->first();
        $subcategories=Subcategorie::where('parent',$categorie['id'])->get();
        $subcategoriesarray=[];
        $i=0;
        foreach($subcategories as $subcat){
            $subcategoriesarray[$i]=$subcat->id;
            $i++;
        }
        return $subcategoriesarray;
    }
}
