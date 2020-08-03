<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ExamRequest;
use Carbon\Carbon;
use Auth;
use Session;
use App\Exam;
use App\Examination;
use App\Question;
use App\Answer;
use App\Categorie;
use App\Subcategorie;
class ExamController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Exam $model) {
        $items="";
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2){
            $items = Exam::latest('updated_at')->where('is_completed_writing', '1')->get();
        }elseif(Auth::user()->role_id==3){
            $items = Exam::latest('updated_at')->where('is_completed_writing', '1')->where('author',Auth::user()->id)->get();
        }elseif(Auth::user()->role_id==4){
            $examination=Examination::where('user_id',Auth::user()->id)->get();
            $listexam = [];
            foreach ($examination as $examinationdata){
                $listexam[]=$examinationdata->exam_id;
            }
            $items = Exam::latest('updated_at')->where('is_completed_writing', '1')->where('status','1')->wherein('id',$listexam)->get();
        }
        return view('exams.index', compact('items'));
    }
    /**
     * Show the forms and store data for creating new exam.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categs = Subcategorie::latest('id')->get();
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2 || Auth::user()->role_id==3){
            return view('exams.create', compact('categs'));
        }else{
            abort('404');
        }
    }
    public function create_2(Request $request) {
        $ToInsert = [ 'number_questions'=>$request->number_questions, 'author'=>Auth::user()->id, 'subcategory'=>$request->subcategory ];
        $insert = Exam::where( 'number_questions', '=', $request->number_questions, 'and', 'author', '=', Auth::user()->id, 'and', 'subcategory', '=', $request->subcategory, 'and', 'created_at', Carbon::today() )->first();
        if ($insert === null) { $insert = Exam::create($ToInsert); }
        $examdata = [ 'id'=>$insert->id, 'title'=>$request->title, 'description'=>$request->description, 'tags'=>$request->tags, 'number_questions'=>$request->number_questions, 'duration'=>$request->duration, 'minimum_score'=>$request->minimum_score, 'author'=>Auth::user()->id, 'subcategory'=>$request->subcategory, 'is_completed_writing'=>false, 'status'=>2, ];
        $exam = [ 'id'=>$insert->id, 'number_questions'=>$insert->number_questions ];
        $exam += [ 'exam'=>$examdata ];
        $request->session()->put('exam', $exam);
        $exam = $request->session()->get('exam');
        return view('exams.create2',compact('exam'));
    }
    public function create_3(Request $request) {
        $exam = $request->session()->get('exam');
        $questions = [];
        for($i=1;$i<=$exam['number_questions'];$i++){
            $ToInsert = [ 'content_area_one'=>$request->{'question_' . $i}, 'content_area_two'=>$request->{'complements_' . $i}, 'nbr_answers'=>$request->{'nbr_answers_' . $i}, 'question_order'=>$i, 'exam_of_question'=>$exam['id'] ];
            $insert = Question::where( 'content_area_one', '=', $request->{'question_' . $i}, 'and', 'content_area_two', '=', $request->{'complements_' . $i}, 'and', 'nbr_answers', '=', $request->{'nbr_answers_' . $i}, 'and', 'question_order', '=', $i, 'and', 'exam_of_question', '=', $exam['id'], 'and', 'created_at', Carbon::today() )->first();
            if ($insert === null) { $insert = Question::create($ToInsert); }
            $questions[$i] = [ 'id'=>$insert->id, 'content_area_one'=>$request->{'question_' . $i}, 'content_area_two'=>$request->{'complements_' . $i}, 'nbr_answers'=>$request->{'nbr_answers_' . $i}, 'question_order'=>$i, 'exam_of_question'=>$exam['id'] ];
        }
        $exam += ['questions'=>$questions];
        $request->session()->put('exam', $exam);
        $exam = $request->session()->get('exam');
        return view('exams.create3',compact('exam'));
    }
    public function store(Request $request) {
        $exam = $request->session()->get('exam');
        $answers = [];
        for($i=1;$i<=$exam['number_questions'];$i++){
            for($j=1;$j<=$exam['questions'][$i]['nbr_answers'];$j++){
                $ToInsert = [ 'answers_order'=>$j, 'question_of_answer'=>$exam['questions'][$i]['id'] ];
                $insert = Answer::create($ToInsert);
                $answerdata[$i][$j] = [ 'id'=>$insert->id, 'content'=>$request->{'content_q' . $i . '_a' . $j}, 'answers_order'=>$j, 'question_of_answer'=>$exam['questions'][$i]['id'] ];
            }
            for($j=1;$j<=$exam['questions'][$i]['nbr_answers'];$j++){
                foreach ($request->{'correct_answers_q' . $i} as $vl) {
                    $correctanswer = Answer::where('answers_order', $vl)->get();
                    foreach ($correctanswer as $key => $value) {
                        if($answerdata[$i][$j]['id'] == $correctanswer[$key]->id){
                            $answerdata[$i][$j] += ['is_correct_answer'=>true];
                        }
                    }
                }
            }
            $answers += $answerdata;
        }
        $exam += ['answers'=>$answers];
        $request->session()->put('exam', $exam);
        $exam = $request->session()->get('exam');
        $exam['exam']['is_completed_writing']=true;
        Exam::where('id',$exam['exam']['id'])->update($exam['exam']);
        for($i=1;$i<=count($exam['questions']);$i++){
            Question::where('id',$exam['questions'][$i]['id'])->update($exam['questions'][$i]);
        }
        for($i=1;$i<=count($exam['answers']);$i++){
            for($j=1;$j<=count($exam['answers'][$i]);$j++){
                Answer::where('id',$exam['answers'][$i][$j]['id'])->update($exam['answers'][$i][$j]);
            }
        }
        Session::forget('exam');
        return redirect()->route('exam.index')->withStatus(__('Exam successfully created.'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id) {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
    public function update(Request $request, $id) {
        //
    }*/
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam) {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2 || Auth::user()->role_id==3){
            return view('exams.edit', compact('exam'));
        }else{
            abort('404');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Exam $exam) {
            $exam->title=$request->get('title');
            $exam->description=$request->get('description');
            $exam->duration=$request->get('duration');
            $exam->minimum_score=$request->get('minimum_score');

            //$author = DB::table('users')->find($request->get('author'));
    $author = DB::select('SELECT id FROM users WHERE name = ?' , [$request->get('author')]);
    
            $exam->author=$author[0]->id;

$subcategoryid = DB::select('SELECT * FROM subcategories WHERE name = ?' , [$request->get('subcategory')]);

         //$subcategory = DB::table('subcategories')->find();
            $exam->subcategory=$subcategoryid[0]->id;

                $exam->save();
                 return redirect()->route('exam.index')->withStatus(__('exam successfully updated.'));
            }
    /**
     * Make item active.
     * 
     */
    public function activate(Request $request) {
        $item = Exam::findOrFail($request->id);
        $item->status='1';
        $item->save();
        return redirect()->back()->withStatus(__('Exam successfully activated.'));
    }
    /**
     * Make item inactive.
     * 
     */
    public function deactivate(Request $request) {
        $item = Exam::findOrFail($request->id);
        $item->status='3';
        $item->save();
        return redirect()->back()->withStatus(__('Exam successfully deactivated.'));
    }
    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Exam  $exam) {
        if(Auth::user()->role_id==1 || Auth::user()->role_id==2 || Auth::user()->role_id==3){
            $exam->delete();
            return redirect()->back()->withStatus(__('Exam successfully deleted.'));
        }else{
            abort('404');
        }
    }
}
