<?php

namespace app\controllers;

use Yii;
use app\models\Act;
use app\models\ActSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * ActController implements the CRUD actions for Act model.
 */
class ActController extends Controller
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
     * Lists all Act models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Act model.
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
     * Creates a new Act model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new Act();
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
          $protocol = 'https://';
        } else {
          $protocol = 'http://';
        }
      
        if ($model->load(Yii::$app->request->post()) && $model->save())  {
            $file = UploadedFile::getInstance($model, 'scan');
            if ($file && $file->tempName) {
                $model->file = $file;
                if ($model->validate(['scan'])) {
                            
                    $dir = Yii::getAlias('scan');
                    $fileName = $model->file->baseName . '.' . $model->file->extension;
                    $model->file->saveAs('scan/'.$dir . $fileName);
                    $model->file = $fileName;
                    $model->scan = $protocol.$_SERVER[SERVER_NAME] .'/scan/'.$dir . $fileName;
                }
            } 
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }               
            
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
  
    /**
     * Updates an existing Act model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
  
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $current_image = $model->scan;
        //$model->sections = explode(',', $model->sections);
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
          $protocol = 'https://';
        } else {
          $protocol = 'http://';
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        $file = UploadedFile::getInstance($model, 'scan');
            if ($file && $file->tempName) {
                $model->file = $file;
                if ($model->validate(['scan'])) {                    
                    //Если отмечен чекбокс «удалить файл»            
                    if($model->del_img)
                    {
                        if(file_exists(Yii::getAlias($protocol.$_SERVER[SERVER_NAME] .'/'.$current_image)))
                        {
                            //удаляем файл
                            unlink(Yii::getAlias($protocol.$_SERVER[SERVER_NAME] .'/'.$current_image));
                            $model->scan = '';
                        }
                    }                
                  
                    $dir = Yii::getAlias('scan');
                    $fileName = $model->file->baseName . '.' . $model->file->extension;
                    $model->file->saveAs('scan/'.$dir . $fileName);
                    $model->file = $fileName;
                    $model->scan = $protocol.$_SERVER[SERVER_NAME] .'/scan/'.$dir . $fileName;
                }
            } 
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Act model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Act model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Act the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Act::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
