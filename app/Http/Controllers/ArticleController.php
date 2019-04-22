<?php

namespace App\Http\Controllers;
use App\Label;
use App\Repositories\Interfaces\ArticleInterface;
use App\User;
use Illuminate\Http\Request;

/**
 * @property ArticleInterface articleInterface
 */
class ArticleController extends Controller
{
   public function __construct(ArticleInterface $articleInterface)
   {
     $this->articleInterface = $articleInterface;
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


      $filter = $request->input('filter');

      $pageSize = $request->input('page_size',10);

      $article = $this->articleInterface->getArticles($filter, $pageSize);



      return $article;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');

        $intro = $request->input('intro');
        $content = $request->input('content');
        $tech_category_id = $request->input('techCategory');
        $label = $request->input('label');
        $created_user = $request->input('createdUser');

        $label_id = Label::insertGetId(['name' => $label]);
        $created_user_id = User::insertGetId(['name' => $created_user]);

        $this->articleInterface->createArticles($title, $intro, $content, $tech_category_id, $label_id, $created_user_id);

        return response()->json([
          'status' => 200,
          'message' => '添加成功',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $article = $this->articleInterface->editArticleById($id);

      return $article;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $title = $request->input('title');

      $intro = $request->input('intro');
      $content = $request->input('content');
      $tech_category_id = $request->input('techCategory');
      $label = $request->input('label');
      $created_user = $request->input('createdUser');


      if (Label::where('name',$label)->exists()) {
        $label_id = Label::where('name',$label)->value('id');
      } else {
        $label_id = Label::insertGetId(['name' => $label]);
      }

      if (User::where('name',$created_user)->exists()) {
        $created_user_id = User::where('name',$created_user)->value('id');
      } else {
        $created_user_id = User::insertGetId(['name' => $created_user]);
      }


      $this->articleInterface->updateArticle($id ,$title, $intro, $content, $tech_category_id, $label_id, $created_user_id);

      return response()->json([
        'status' => 200,
        'message' => '更新成功',
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$id = $request->get('id');
        $this->articleInterface->deleteById($id);

        return response()->json([
          'status' => 200,
          'message' => '删除成功',
        ]);

    }

   public function getFiliterIndex(Request $request, $id)
   {
     $pageSize = $request->input('page_size',10);
     $article = $this->articleInterface->getFiliter($id, $pageSize);

     return $article;
   }


}
