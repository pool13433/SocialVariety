<div class="ui vertical sidebar menu icon labeled"> <!--ui left demo vertical inverted labeled icon sidebar menu overlay along -->
    <?php foreach ($categories as $index => $value) { ?>
        <a class="item item-cetegory"> <i class="<?= $value['cat_icon'] ?> icon"></i> <?= $value['cat_nameth'] ?></a>
    <?php } ?>    
</div>

<div class="ui top fixed menu">
    <div class="ui title  item launch button">
        <i class="big icons">
            <i class="big loading sun icon"></i>
            <i class="sidebar icon"></i>
        </i>        
    </div>
    <div class="ui  borderless item button">        
        <i class="huge icons" onclick="$('.modal-fanpage').modal('show')">
            <i class="facebook square icon"></i>
            <i class="corner add icon"></i>
        </i>
    </div>
</div>



<div class="pusher" style="margin-left: 20px;margin-right:20px;margin-top: 80px;">

    <div class="ui active dimmer loading">
        <div class="ui large text loader">Loading</div>
    </div>

    <div class="ui segment">
        <div class="ui one column grid">
            <div class="row">
                <div class="column">

                    <h5 class="ui top attached header">Games</h5>
                    <div class="ui attached segment">

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
</div>

<form class="ui modal form modal-fanpage">
    <i class="close icon"></i>
    <div class="header">
        เพิ่ม Fanpage
    </div>
    <div class="content ui inverted">
        <div class="field">
            <label>Pagepage URL</label>
            <input placeholder="Fanpage URL" type="url" name="fan_name">
        </div>
        <div class="two fields">
            <div class="field">
                <label>First Name</label>
                <select class="dropdown ui" name="cat_id">
                    <?php foreach ($categories as $index => $value) { ?>
                        <option value="<?= $value['cat_id'] ?>"><?= $value['cat_nameth'] ?></option>                        
                    <?php } ?>  
                </select>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui button cancel orange"><i class="remove icon"></i> ปิด</div>
        <div class="ui button submit green"><i class="save icon"></i> บันทึก</div>
    </div>
</form>

