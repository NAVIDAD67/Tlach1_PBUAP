<?php

namespace app\controllers;

use Yii;
use app\models\Empresa;
use app\models\EmpresaSerch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;

use yii\web\UploadedFile;
use yii\data\Pagination;


/**
 * EmpresaController implements the CRUD actions for Empresa model.
 */
class EmpresaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'acces'=>[
                'class'=>AccessControl::ClassName(),
                'only'=>['index','view','create','update'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ]
                ]

            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Empresa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpresaSerch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empresa model.
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
     * Creates a new Empresa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Empresa();

        $this->subirFoto($model);

        

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Empresa model.
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
     * Deletes an existing Empresa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);


        if(file_exists($model->logo_empresa)){
            unlink($model->logo_empresa);
        }

        $model->delete();

        return $this->redirect(['index']);
    }


public function actionLista(){

    $model=Empresa::find();

    $paginacion= new Pagination([

        'defaultPageSize'=>4,
        'totalCount'=> $model->count()
    ]);

        $empresa= $model->orderby('Nombre')->offset($paginacion->offset)->limit($paginacion->limit)->all();

    return $this->render('lista',['empresas'=>$empresa,'paginacion'=>$paginacion]);
}






    /**
     * Finds the Empresa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empresa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empresa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function subirFoto( Empresa $model){
        if ($model->load(Yii::$app->request->post())  ) {

            $model->archivo=UploadedFile::getInstance($model,'archivo');

                if($model->validate()){

                    if ($model->archivo){

                        if(file_exists($model->logo_empresa)){
                            unlink($model->logo_empresa);
                        }

                        $ruta_archivo ='uploads/'.time()."_".$model->archivo->baseName.".".$model->archivo->extension;

                            if($model->archivo->saveAs($ruta_archivo)){
                                $model->logo_empresa=$ruta_archivo; 
                            }
                    }
                      

                }


            

               if($model->save(false)){
                   return $this->redirect(['index']);
               }

            
        }

    }
}
