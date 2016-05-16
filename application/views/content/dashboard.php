<div class="ui" style="margin-left: 20px;margin-right:20px;">
    <div class="ui one column grid">
        <div class="row" style="margin-top: 50px;">
            <div class="column">
                <div class="ui compact labeled icon menu">
                    <?php foreach ($categories as $index => $value) { ?>
                        <a class="item"> <i class="<?=$value['cat_icon']?> icon"></i> <?= $value['cat_nameth'] ?></a>
                    <?php } ?>                    
                </div>
            </div>
        </div>


        <div class="row">
            <div class="column">
                <h5 class="ui top attached header">Games</h5>
                <div class="ui attached segment">
                    <div class="ui inverted dimmer box-loader">
                        <div class="ui large text loader">Loading</div>
                    </div>
                    <div class="ui stackable grid group-game">
                        <div class="five wide column card-big special stackable">
                            <!-- Jquery Load -->
                        </div>
                        <div class="eleven wide  column stackable">
                            <div class="ui four stackable cards special card-small">
                                <!-- Jquery Load -->
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>



    </div>
</div>