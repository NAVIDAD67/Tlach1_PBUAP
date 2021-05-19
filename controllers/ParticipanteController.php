<?php

namespace app\controllers;

use Yii;
use app\models\Participante;
use app\models\ParticipanteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * ParticipanteController implements the CRUD actions for Participante model.
 */
class ParticipanteController extends Controller
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
     * Lists all Participante models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ParticipanteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Participante model.
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
     * Creates a new Participante model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Participante();

        $this->subirFoto($model);

        

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Participante model.
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
     * Deletes an existing Participante model.
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

        return $this->redirect(['index']);
    }

    /**
     * Finds the Participante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Participante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Participante::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function subirFoto( Participante $model){
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
