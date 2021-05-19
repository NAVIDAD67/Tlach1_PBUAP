<?php

namespace app\controllers;

use Yii;
use app\models\Encargado;
use app\models\EncargadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;
use yii\data\Pagination;



/**
 * EncargadoController implements the CRUD actions for Encargado model.
 */
class EncargadoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Encargado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EncargadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Encargado model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Encargado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Encargado();

        $this->subirFoto($model);

        

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Encargado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $this->subirFoto($model);


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Encargado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
         
        $model=$this->findModel($id);


        if(file_exists($model->foto)){
            unlink($model->foto);
        }

        $model->delete();

        return $this->redirect(['index']);;
    }


    public function actionLista(){

        $model = Encargado::find();

        $paginacion = new Pagination([

            'defaultPageSize'=>4,
            'totalCount'=>$model->count()

        ]);

        $encargado= $model->orderBy('nombre')->offset($paginacion->offset)->limit($paginacion->limit)->all();

        return $this->render('lista',['encargados'=>$encargado,'paginacion'=>$paginacion]);

    }

    /**
     * Finds the Encargado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Encargado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Encargado::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }





    protected function subirFoto( Encargado $model){
        if ($model->load(Yii::$app->request->post())  ) {

            $model->archivo=UploadedFile::getInstance($model,'archivo');

                if($model->validate()){

                    if ($model->archivo){

                        if(file_exists($model->foto)){
                            unlink($model->foto);
                        }

                        $ruta_archivo ='uploads/'.time()."_".$model->archivo->baseName.".".$model->archivo->extension;

                            if($model->archivo->saveAs($ruta_archivo)){
                                $model->foto=$ruta_archivo; 
                            }
                    }
                      

                }


            

               if($model->save(false)){
                   return $this->redirect(['index']);
               }

            
        }

    }



}
