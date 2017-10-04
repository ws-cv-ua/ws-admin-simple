<?php
/*
 * @var $tree array
 * @var $lvl string
 * @var $parent_id string
 * @var $sort_action string
 * @var $modelClass WsCategory
 */
if(isset($tree) && $tree){
?>
<ul class="tree lvl-<?=isset($lvl) ? $lvl : 0 ?>"
    <?= isset($parent_id) && $parent_id ? 'data-parent_id="'.$parent_id.'"' : '' ?>
    <?= isset($modelClass) && $modelClass ? 'data-model_class ="'.$modelClass.'"' : '' ?>
    <?= isset($sort_action) && $sort_action ? 'data-sort_action ="'.$sort_action.'"' : '' ?>
    >
    <?php foreach ($tree as $item){
        if(!is_array($item['names']))
            $item['names'] = json_decode($item['names'],true);
        ?>
        <li data-id="<?=$item['id']?>" data-key="<?=$item['key']?>">
            <?= \yii\helpers\Html::a(
                $item['names'][\yii::$app->language] ? $item['names'][\yii::$app->language] : $item['key'],
                ['',],[
                    'data'=>[
                        'method' => 'post',
                        'pjax' => true,
                        'params'=>[
                            'action'=>'edit',
                            'model_id'=>$item['id']
                        ]
                    ]
                ]
            )?>
            <?= \yii\helpers\Html::a('<i class="glyphicon glyphicon-trash"></i>',
                ['',],[
                    'class' => 'flr del-link',
                    'data'=>[
                        'method' => 'post',
                        'pjax' => true,
                        'params'=>[
                            'action'=>'delete',
                            'model_id'=>$item['id']
                        ]
                    ]
                ]
            )?>
            <?= \yii\helpers\Html::a('<i class="glyphicon glyphicon-plus"></i>',
                ['',],[
                    'class' => 'flr add-link green',
                    'data'=>[
                        'method' => 'post',
                        'pjax' => true,
                        'params'=>[
                            'action'=>'new',
                            'parent_id'=>$item['id']
                        ]
                    ]
                ]
            )?>
            <span class="glyphicon glyphicon-move move-li flr"></span>
            <? if(isset($item['children']) && $item['children']){
                echo $this->render('tree',[
                    'tree'     => $item['children'],
                    'lvl'      => $lvl+1,
                    'parent_id' => $item['id'],
                ]);
            } else { ?>
                <ul class="tree lvl-<?=$lvl+1?>"></ul>
            <? } ?>
        </li>
    <? } ?>
</ul>
<? } ?>
