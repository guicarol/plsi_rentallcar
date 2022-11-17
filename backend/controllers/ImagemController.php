<?php

namespace backend\controllers;

use common\models\Imagem;
use common\models\ImagemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ImagemController implements the CRUD actions for Imagem model.
 */
class ImagemController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Imagem models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ImagemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Imagem model.
     * @param int $id_imagem Id Imagem
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_imagem)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_imagem),
        ]);
    }

    /**
     * Creates a new Imagem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Imagem();

        if ($model->load(\Yii::$app->request->post())) {
            $model->save();
            $imageId = $model->id_imagem;
            $image = UploadedFile::getInstance($model, 'imagem');
            $imgname = 'img_'. $imageId . '.' . $image->getExtension();
            $image->saveAs(\Yii::getAlias('@carImgPath') . '/' . $imgname);
            $model->imagem = $imgname;
            $model->save();

            return $this->redirect(['view', 'id_imagem' => $model->id_imagem]);

        }else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Imagem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_imagem Id Imagem
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_imagem)
    {
        $model = $this->findModel($id_imagem);

        if ($model->load($this->request->post())) {
            $model->save();
            $image = UploadedFile::getInstance($model, 'imagem');
            $imgname = 'img_' . $model->id_imagem . '.' . $image->getExtension();
            $image->saveAs(\Yii::getAlias('@carImgPath') . '/' . $imgname);
            $model->imagem = $imgname;
            $model->save();

            return $this->redirect(['view', 'id_imagem' => $model->id_imagem]);

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Imagem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_imagem Id Imagem
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_imagem)
    {
        $this->findModel($id_imagem)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Imagem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_imagem Id Imagem
     * @return Imagem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_imagem)
    {
        if (($model = Imagem::findOne(['id_imagem' => $id_imagem])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
