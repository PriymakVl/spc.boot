<?php
    use yii\helpers\Url;
?>
<style type="text/css">

.bigicon {
    font-size: 35px;
    color: #36A0FF;
}
</style>

<div class="container news">
    <div class="row">
        <div class="col-md-12">
            
            <!-- news -->

            <? if ($news): ?>

                <? foreach ($news as $item): ?>
                    <div class="panel panel-default">
                        <div class="panel-body"> 
                            <div class="col-md-2">
                                <a href="<?=Url::to('/news/view', ['id' => $item->id])?>">
                                    <? printf('<img src="/web/images/%s/%s">', $item->image->subdir, $item->image->filename); ?>
                                </a>
                            </div>
                            <div class="col-md-10">
                                <div class="date"><?=date('d-m-y', $item->created_at)?></div>
                                <h3>
                                    <a href="<?=Url::to('/news/view', ['id' => $item->id])?>"><?=$item->title?></a>
                                </h3>
                                <?=$item->text?>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            <? else: ?>
                <p>Новостей еще нет</p>
            <? endif; ?>

        </div>
    </div>
</div>