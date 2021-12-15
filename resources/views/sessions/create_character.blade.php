
<x-app>
    <x-dashboard_sidebar>
    </x-dashboard_sidebar>
    <div class="card-transparent" style="margin-left:315px; margin-top: -115px" id="main_card_carousel">
        <form action="/save_character" method="post" id="form1">
            @csrf
        <div class="carousel slide col-sm-10 rounded"style="background-color: rgba(41, 43, 44, 0.6)" data-ride="carousel" data-interval="false" id="carouselForm">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                        <div class="form-group">
                            <div class="form-group  text-primary">
                                <div class="form-group row">
                                    <label for="char_name"class="col-sm-4 col-form-label">Character Name</label>
                                    <input type="text" class="form-text-primarycontrol" id="char_name" name="char_name" value="" placeholder="Character Name">
                                </div>
                                <div class="form-group row">
                                    <label for="alignment_select"class="col-sm-4 col-form-label">Alignment</label>
                                    <select class="form-control text-primary col-md-4" id="alignment_select" name="alignment_select">
                                        <option>Lawful Good</option>
                                        <option>Neutral Good</option>
                                        <option>Chaotic Good</option>
                                        <option>Lawful Neutral</option>
                                        <option>Neutral Neutral</option>
                                        <option>Chaotic Neutral</option>
                                        <option>Lawful Evil</option>
                                        <option>Neutral Evil</option>
                                        <option>Chaotic Evil</option>
                                    </select>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#alignment_modal" id="align_desc_modal_btn">description</button>
                                </div>
                            </div>
                        </div>
                    <button type="button" class="btn btn-primary" data-slide="next" id="btn_name_select" data-target="#carouselForm" data-slide="next">Continue</button>
                </div>
                <div class="carousel-item">
                    <div class="form-group text-primary">
                        <label for="race_select">Races</label>
                        <select class="form-control text-primary col-sm-2" id="race_select" name="race_select">
                            <option>Dragonborn</option>
                            <option>Dwarf</option>
                            <option>Elf</option>
                            <option>Gnome</option>
                            <option>Half-Elf</option>
                            <option>Half-Orc</option>
                            <option>Human</option>
                            <option>Tiefling</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" data-slide="next" data-target="#carouselForm"  id="btn_race_select">Continue</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#race_modal" id="race_modal_btn">
                        View Race
                    </button>
                </div>
                <div class="carousel-item">
                    <div class="form-group text-primary">
                        <label for="class_select">Classes</label>
                        <select class="form-control text-primary col-sm-2 " data-style="btn-primary" id="class_select" name="class_select">
                            <option>Barbarian</option>
                            <option>Bard</option>
                            <option>Cleric</option>
                            <option>Druid</option>
                            <option>Fighter</option>
                            <option>Monk</option>
                            <option>Paladin</option>
                            <option>Ranger</option>
                            <option>Rogue</option>
                        </select>
                    </div>
                    <button onclick="get_saving_throw_attributes()"type="button" class="btn btn-primary" data-slide="next" data-target="#carouselForm"  id="btn_class_select">Continue</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#class_modal" id="class_modal_btn">
                        View Class
                    </button>
                </div>
                <div class="carousel-item">
                    <button type="button" class="btn btn-primary">
                        Points Left <div class="badge badge-light" id = "point_counter" >27</div>
                    </button>

                    <div class="form-group text-primary">

                        <div class="form-group row">
                            <label for="cha_select" class="col-sm-2 col-form-label">Charisma</label>
                            <button onClick="point_assignment(this)" type="button" class="btn btn-danger btn-sm" id="cha_-">-</button>
                            <input type="text" class="form-text-primarycontrol col-sm-1" id="cha_select" name="cha_select" value="8" readonly>
                            <button onClick="point_assignment(this)"  type="button" class="btn btn-primary btn-sm" id="cha_+">+</button>
                            <button id="cha_mod_color" type="button" class="btn btn-danger text-sm btn-sm ml-4">
                                Bonus Mod: <div class="badge badge-light" id = "cha_mod" >-1</div>
                            </button>

                        </div>

                        <div class="form-group row">
                            <label for="con_select" class="col-sm-2 col-form-label">Constitution</label>
                            <button onClick="point_assignment(this)" type="button" class="btn btn-danger btn-sm" id="con_-">-</button>
                            <input type="text" class="form-text-primarycontrol col-sm-1" id="con_select" name="con_select" value="8" readonly>
                            <button onClick="point_assignment(this)" type="button" class="btn btn-primary btn-sm" id="con_+">+</button>
                            <button id="con_mod_color" type="button" class="btn btn-danger text-sm btn-sm ml-4">
                                Bonus Mod: <div class="badge badge-light" id = "con_mod" >-1</div>
                            </button>
                        </div>

                        <div class="form-group row">
                            <label for="dex_select" class="col-sm-2 col-form-label">Dexterity</label>
                            <button onClick="point_assignment(this)" type="button" class="btn btn-danger btn-sm" id="dex_-">-</button>
                            <input type="text" class="form-text-primarycontrol col-sm-1" id="dex_select" name="dex_select" value="8" readonly>
                            <button onClick="point_assignment(this)" type="button" class="btn btn-primary btn-sm" id="dex_+">+</button>
                            <button id="dex_mod_color" type="button" class="btn btn-danger text-sm btn-sm ml-4">
                                Bonus Mod: <div class="badge badge-light" id = "dex_mod" >-1</div>
                            </button>
                        </div>

                        <div class="form-group row">
                            <label for="int_select" class="col-sm-2 col-form-label">Intelligence</label>
                            <button onClick="point_assignment(this)" type="button" class="btn btn-danger btn-sm" id="int_-">-</button>
                            <input type="text" class="form-text-primarycontrol col-sm-1" id="int_select" name="int_select" value="8" readonly>
                            <button onClick="point_assignment(this)" type="button" class="btn btn-primary btn-sm" id="int_+">+</button>
                            <button id="int_mod_color" type="button" class="btn btn-danger text-sm btn-sm ml-4">
                                Bonus Mod: <div class="badge badge-light" id = "int_mod" >-1</div>
                            </button>
                        </div>

                        <div class="form-group row">
                            <label for="str_select" class="col-sm-2 col-form-label">Strength</label>
                            <button onClick="point_assignment(this)"  type="button" class="btn btn-danger btn-sm" id="str_-">-</button>
                            <input type="text" class="form-text-primarycontrol col-sm-1" id="str_select" name="str_select" value="8" readonly>
                            <button onClick="point_assignment(this)" type="button" class="btn btn-primary btn-sm" id="str_+">+</button>
                            <button id="str_mod_color" type="button" class="btn btn-danger text-sm btn-sm ml-4">
                                Bonus Mod: <div class="badge badge-light" id = "str_mod" >-1</div>
                            </button>
                        </div>

                        <div class="form-group row">
                            <label for="wis_select" class="col-sm-2 col-form-label">Wisom</label>
                            <button onClick="point_assignment(this)" type="button" class="btn btn-danger btn-sm" id="wis_-">-</button>
                            <input type="text" class="form-text-primarycontrol col-sm-1" id="wis_select" name="wis_select" value="8" readonly>
                            <button onClick="point_assignment(this)" type="button" class="btn btn-primary btn-sm" id="wis_+">+</button>
                            <button id="wis_mod_color" type="button" class="btn btn-danger text-sm btn-sm ml-4">
                                Bonus Mod: <div class="badge badge-light" id = "wis_mod" >-1</div>
                            </button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-slide="next" data-target="#carouselForm"  id="btn_attribute_continue">Continue</button>
                    </button>
                </div>
                <div class="carousel-item">
                    <div class="form-check" id="proficiencies_check_box">
                        <button type="button" class="btn btn-primary">
                            Choose <div class="badge badge-light" id ="proficiency_counter_badge" ></div>
                        </button>
                    </div>
                    <button type="button" class="btn btn-primary" data-slide="next" data-target="#carouselForm"  id="save_submit_btn" onclick="hide_carousel()">Review and Save</button>
                </div>
            </div>
        </div>
            <input type="hidden" id="saving_throws_input" name="saving_throws_json" value=""/>
            <input type="hidden" id="prof_bonus_input" name="prof_bonus_json" value=""/>
        </form>
        <div class="card" id="summary_card" style="background-color: rgba(41, 43, 44, 0);display: none ">
            <div class="card-deck">
                <div class="card col-sm-4">
                    <img class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Personal Information <br><hr></h5>
                        <p class="card-text" id="char_name_summary">Character Name:</p>
                        <p class="card-text" id="char_alignment_summary">Alignment:</p>
                        <p class="card-text" id="char_race_summary">Race:</p>
                        <p class="card-text" id="char_class_summary">Class:</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"></small>
                    </div>
                </div>
                <div class="card col-sm-4" >
                    <img class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Attributes<br><hr></h5>
                        <p class="card-text" id="saving_throws_summary">Saving Throws:</p>
                        <p class="card-text" id="cha_summary">CHA:</p>
                        <p class="card-text" id="con_summary">CON:</p>
                        <p class="card-text" id="dex_summary">DEX:</p>
                        <p class="card-text" id="int_summary">INT:</p>
                        <p class="card-text" id="str_summary">STR:</p>
                        <p class="card-text" id="wis_summary">WIS:</p>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="card-deck">
                <div class="card col-sm-4">
                    <img class="card-img-top">
                    <div class="card-body" id="prof_summary">
                        <h5 class="card-title">Proficient Skills<br><hr></h5>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>

                <div class="card col-sm-4">
                    <img class="card-img-top">
                    <div class="card-body" id="prof_summary">
                        <h5 class="card-title">Save Character<br><hr></h5>
                        <button type="submit" class="btn btn-primary" onclick="save_submit();">Submit</button>
                        <button type="button" class="btn btn-primary" onclick="window.location.href='http://www.dndcharactercreation.com/create_character';">Start Over</button>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>

        {{--    BEGIN MODALS --}}
        {{--    RACE MODAL   --}}
        <div class="modal fade" id="race_modal" tabindex="-1" role="dialog" aria-labelledby="race_modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="race_title">Confirm Race</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>`
                    </div>
                    <div class="modal-body" id = "race_data">
                        <div class="alert alert-primary" role="alert" id="race_name">

                        </div>
                        <div class="alert alert-primary" role="alert" id="speed">

                        </div>
                        <div class="alert alert-primary" role="alert" id="ability_bonuses">

                        </div>
                        <div class="alert alert-primary" role="alert" id="alignment">

                        </div>
                        <div class="alert alert-primary" role="alert" id="age">

                        </div>
                        <div class="alert alert-primary" role="alert" id="size">

                        </div>
                        <div class="alert alert-primary" role="alert" id="size_description">

                        </div>
                        <div class="alert alert-primary" role="alert" id="starting_proficiencies">

                        </div>
                        <div class="alert alert-primary" role="alert" id="languages">

                        </div>
                        <div class="alert alert-primary" role="alert" id="language_desc">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Confirm Race</button>
                    </div>
                </div>
            </div>
        </div>
        {{--    CLASS MODAL    --}}
        <div class="modal fade" id="class_modal" tabindex="-1" role="dialog" aria-labelledby="class_modal_Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="class_title">Confirm Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id = "race_data">
                        <div class="alert alert-primary" role="alert" id="class_name">

                        </div>
                        <div class="alert alert-primary" role="alert" id="hit_die">

                        </div>
                        <div class="alert alert-primary" role="alert" id="proficiencies">

                        </div>
                        <div class="alert alert-primary" role="alert" id="saving_throws">

                        </div>
                        <div class="alert alert-primary" role="alert" id="starting_equipment">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Confirm Race</button>
                    </div>
                </div>
            </div>
        </div>
        {{--    Alignment MODAL    --}}
        <div class="modal fade" id="alignment_modal" tabindex="-1" role="dialog" aria-labelledby="alignment_modal_Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="class_title">Alignment:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id = "align_desc_data">
                        <div class="alert alert-primary" role="alert" id="align_desc_div">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>

<script>
    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });
    // $(document).ready(function() {
    //     $(window).keypress(function(event){
    //         if($('#char_name').val()=="") {
    //             $('#btn_name_select').prop("disabled", true);
    //             console.log("ETST TEST")
    //         }
    //     });
    // });
    // Functions below make a call to api_functions that grab the info from third party and return
    $( "#race_modal_btn" ).click(function()
    {
        $.ajax(
            {
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:'api_functions',
                data:
                    {
                        function_call:'races',
                        data_type:$('#race_select').val()
                    },
                success: function (data) {
                    var race_array = (JSON.parse(data));
                    // alert('Data from the server' + data);
                    build_race_modal_out(race_array);

                },
                error: function () {
                    alert('AJAX call error');
                }
            }
        );


    });
    $( "#btn_race_select" ).click(function()
    {
        $.ajax(
            {
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:'api_functions',
                data:
                    {
                        function_call:'races',
                        data_type:$('#race_select').val()
                    },
                success: function (data) {
                    var race_array = (JSON.parse(data));
                    // alert('Data from the server' + data);
                    build_race_modal_out(race_array);

                },
                error: function () {
                    alert('AJAX call error');
                }
            }
        );


    });
    $( "#class_modal_btn" ).click(function()
    {
        $.ajax(
            {
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:'api_functions',
                data:
                    {
                        function_call:'classes',
                        data_type:$('#class_select').val()
                    },
                success: function (data) {
                    var class_array = JSON.parse(data);
                    console.log(data);
                    build_class_modal_out(class_array);
                },
                error: function () {
                    alert('AJAX call error');
                }
            }
        );
    });
    $( "#align_desc_modal_btn" ).click(function()
    {
        var align_desc = $('#alignment_select').val()
        align_desc = align_desc.toLowerCase()
        align_desc = align_desc.replace(" ","-")
        $.ajax(
            {
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:'api_functions',
                data:
                    {
                        function_call:'alignment',
                        data_type:align_desc
                    },
                success: function (data) {
                    var alignment_array = JSON.parse(data);
                    console.log(data);
                    build_alignment_desc_modal_out(alignment_array);
                },
                error: function () {
                    alert('AJAX call error');
                }
            }
        );
    });
    $( "#btn_attribute_continue" ).click(function()
    {
        $.ajax(
            {
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:'api_functions',
                data:
                    {
                        function_call:'classes',
                        data_type:$('#class_select').val()
                    },
                success: function (data) {
                    var alignment_array = JSON.parse(data);
                    // console.log(data);
                    get_proficiency_choices(alignment_array);
                },
                error: function () {
                    alert('AJAX call error');
                }
            }
        );
    });
    function build_race_modal_out(ajax_data)
    {
        $.each(ajax_data, function(key, value){
            switch(key)
            {
                case "name":

                    $("#" + "race_"+key).html(key + ": " + value);
                    break;

                case "ability_bonuses":
                    /*
                     key in this group is an array of objects with objects eg. below
                    "ability_bonuses": [
                    {
                        "ability_score": {
                            "index": "str",
                            "name": "STR",
                            "url": "/api/ability-scores/str"
                        },
                        "bonus": 1
                    },
                    ]
                     */
                    var bonus_list="<br>";
                    $.each(value, function(ability_bonus_array, scoreBonusObject){
                        var ability_name = scoreBonusObject.ability_score.name;
                        var ability_bonus = scoreBonusObject.bonus;
                        bonus_list = bonus_list + ability_name + " : " + ability_bonus + "<br>";

                        var attribute_bonus_id = document.getElementById(ability_name.toLowerCase()+"_select")
                        var attr_value = parseInt(attribute_bonus_id.value);
                        attr_value = attr_value + parseInt(ability_bonus);
                        console.log(attr_value);
                        attribute_bonus_id.value = attr_value;


                    });
                    $("#"+key).html(key+": "+ bonus_list);
                    break;
                case "languages":
                    var languages_list="<br>";
                    $.each(value, function(languages_array, languagesObject){
                        var languages_name = languagesObject.name;
                        languages_list =languages_list + languages_name +"<br>";
                        console.log(languages_list);
                        console.log(languages_name);
                    });
                    $("#"+key).html(key+": "+ languages_list);
                    break;
                default:
                    $("#"+key).html(key+": "+value);
            }
        });
        // printValues(ajax_data);
    }
    function build_class_modal_out(ajax_data)
    {
        $.each(ajax_data, function(key, value){
            switch(key)
            {
                case "name":

                    $("#" + "class_"+key).html(key + ": " + value);
                    break;

                case "proficiencies":
                    /*
                     key in this group is an array of objects with objects eg. below
                    "ability_bonuses": [
                    {
                        "ability_score": {
                            "index": "str",
                            "name": "STR",
                            "url": "/api/ability-scores/str"
                        },
                        "bonus": 1
                    },
                    ]
                     */
                    var proficiencies_list="<br>";
                    $.each(value, function(proficiencies_array, proficienciesObject){
                        var proficiencies_name = proficienciesObject.name;
                        proficiencies_list =proficiencies_list + proficiencies_name  + "<br>";
                    });
                    $("#" + key).html(key + ": " + proficiencies_list);
                    break;
                case "saving_throws":
                    var savingThrows_list="<br>";
                    $.each(value, function(savingThrows_array, savingThrowsObject){
                        var savingThrows_name = savingThrowsObject.name;
                        savingThrows_list =savingThrows_list + savingThrows_name +"<br>";
                        console.log(savingThrows_list);
                        console.log(savingThrows_name);
                    });
                    $("#" + key).html(key + ": " + savingThrows_list);
                    break;
                case "starting_equipment":
                    var equipment_list="<br>";
                    $.each(value, function(equipment_array, equipmentObject){
                        var equipment_name = equipmentObject.equipment.name;
                        equipment_list =equipment_list + equipment_name +"<br>";
                        console.log(equipment_list);
                        console.log(equipment_name);
                    });
                    $("#" + key).html(key + ": " + equipment_list);
                    break;

                default:
                    $("#" + key).html(key + ": " + value);
            }
        });
    }
    function build_alignment_desc_modal_out(ajax_data)
    {
        var alignment_name = ajax_data.name;
        var align_desc = ajax_data.desc;

        $("#align_desc_div").html(alignment_name + ": " + align_desc);

    }
    function get_proficiency_choices(ajax_data)
    {
        var choice_array = ajax_data.proficiency_choices[0];
        var choice_number= ajax_data.proficiency_choices[0].choose;
        var proficincies_array = choice_array.from;
        // console.log(proficincies_array);
        // console.log(choice_number);
        var prof_choice = document.getElementById("proficiency_counter_badge")
        prof_choice.innerHTML = choice_number;
        $.each(proficincies_array, function(array_key, array_object){
            // console.log(array_object.name);
            // console.log(array_object);
            var parent_element = document.getElementById("proficiencies_check_box");
            var div_row_element = document.createElement("div")
            div_row_element.className = "form-group row";

            var label_element = document.createElement("label");
            label_element.className = "form-check-label text-primary col-sm-3"
            label_element.style = "margin-left: 25px";
            label_element.htmlFor = array_object.index;
            label_element.innerHTML = array_object.name;

            var input_element = document.createElement("input");
            input_element.className="form-check-input col-sm-1";
            input_element.type="checkbox";
            input_element.id=array_object.index;
            input_element.name=array_object.index;
            input_element.onchange=proficiency_check;

            parent_element.appendChild(div_row_element);
            div_row_element.appendChild(label_element);
            div_row_element.appendChild(input_element);


        });

    }
    function point_assignment(the_div)
    {
        var counter_id = document.getElementById("point_counter");
        var counter = parseInt(counter_id.innerHTML);
        console.log(counter);

        var div_array = (the_div.id.split("_"));
        var new_div_id = div_array[0] + "_select";
        var modifier_id = div_array[0] + "_mod";
        var mod_color_id = div_array[0]+"_mod_color";
        var direction = div_array[1];
        // console.log(new_div_id);
        var text_field = document.getElementById(new_div_id);
        var mod_field = document.getElementById(modifier_id);
        var mod_color = document.getElementById(mod_color_id);
        var current_value = parseInt(text_field.value);

        var modifier = Math.floor((current_value - 10)/2);

        switch(direction) {
            case "+":
                if(counter>0 && current_value < 15)
                {
                    if(current_value >= 13)
                    {
                        counter = counter-2;
                    }
                    else{
                        counter--;
                    }
                    counter_id.value = counter;
                    counter_id.innerHTML = counter;
                    current_value++;
                    text_field.value = current_value;
                }
                break;
            case "-":
                if(counter<27 && current_value > 8)
                {
                    if(current_value >= 14)
                    {
                        counter = counter+2;
                    }
                    else{
                        counter++;
                    }
                    current_value--;
                    counter_id.value = counter;
                    counter_id.innerHTML = counter;
                    text_field.value = current_value;

                }
                break;
            default:
            // code block
        }
        modifier = Math.floor((current_value - 10)/2);
        mod_field.innerHTML=(modifier);
        if(modifier<0)
        {
            mod_color.className = "btn btn-danger  btn-sm ml-4";
        }
        if(modifier==0)
        {
            mod_color.className = "btn btn-warning btn-sm ml-4";
        }
        if(modifier > 0)
        {
            mod_color.className = "btn btn-success btn-sm ml-4";
        }

    }
    function proficiency_check()
    {
        var counter_id = document.getElementById("proficiency_counter_badge");
        var counter = counter_id.innerHTML;
        var div_id = this.id;
        var div_to_check = document.getElementById(div_id);
        // console.log(div_to_check);
        if(div_to_check.checked==true)
        {
            if(counter==0)
            {
                div_to_check.checked=false;
                alert("You have reached the maximum amount of proficiencies")
                return;


            }
            else
            {
                counter--;
            }
        }
        if(div_to_check.checked==false)
        {
            counter++;
        }
        counter_id.innerHTML= counter;
    }
    function hide_carousel()
    {
        var carousel = document.getElementById("main_card_carousel");
        var orig_class_name = carousel.className;
        console.log (orig_class_name);
        var carousel_id = carousel.id;
        $("#carouselForm").children().hide();
        // carousel.className = orig_class_name + " .d-none";
        // console.log(orig_class_name + ".d-none");
        summary_page();
    }
    function summary_page()
    {
        // <p class="card-text" id="char_alignment_summary">Alignment:</p>
        // <p class="card-text" id="char_race_summary">Race:</p>
        // <p class="card-text" id="char_class_summary">Class:</p>
        $("#summary_card").show();
        $("#char_name_summary").html("Character Name: "+$("#char_name").val());
        $("#char_alignment_summary").html("Alignment: "+$("#alignment_select").val());
        $("#char_race_summary").html("Race: "+$("#race_select").val());
        $("#char_class_summary").html("Class: "+$("#class_select").val());


        // <p class="card-text" id="cha_summary">CHA:</p>
        // <p class="card-text" id="con_summary">CON:</p>
        // <p class="card-text" id="dex_summary">DEX:</p>
        // <p class="card-text" id="int_summary">INT:</p>
        // <p class="card-text" id="str_summary">STR:</p>
        // <p class="card-text" id="wis_summary">WIS:</p>

        $("#cha_summary").html("CHA: "+$("#cha_select").val());
        $("#con_summary").html("CON: "+$("#con_select").val());
        $("#dex_summary").html("DEX: "+$("#dex_select").val());
        $("#int_summary").html("INT: "+$("#int_select").val());
        $("#str_summary").html("STR: "+$("#str_select").val());
        $("#wis_summary").html("WIS: "+$("#wis_select").val());

        var checkboxes =$("#proficiencies_check_box").find("input:checkbox");
        var prof_bonus_input_array=[];
        $.each(checkboxes,function (array_id,array_data){
            if (array_data.checked==true)
            {
                console.log(array_data);
                var parent_element = document.getElementById("prof_summary");
                var div_row_element = document.createElement("div");
                div_row_element.innerHTML=array_data.id;

                parent_element.appendChild(div_row_element);

                var prof_object ={index:array_data.id};
                console.log(prof_object);
                prof_bonus_input_array.push(prof_object);
            }
            var prof_bonus_input_string = JSON.stringify(prof_bonus_input_array);
            var prof_bonus_id = document.getElementById("prof_bonus_input");
            prof_bonus_id.value = prof_bonus_input_string;

        });


    }
    function get_saving_throw_attributes()
    {
        $.ajax(
            {
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:'api_functions',
                data:
                    {
                        function_call:'classes',
                        data_type:$('#class_select').val()
                    },
                success: function (data) {
                    var saving_throws_id = document.getElementById("saving_throws_input");
                    var class_array = JSON.parse(data);
                    var saving_throws_array=class_array.saving_throws;
                    console.log(saving_throws_array);
                    var saving_throws_array_string = JSON.stringify(saving_throws_array);
                    saving_throws_id.value = saving_throws_array_string;
                    var saving_throws_html="";
                    $.each(saving_throws_array,function (array_id,array_data){
                        if (saving_throws_html=="")
                        {
                            saving_throws_html=array_data.name;
                        }
                        else{
                            saving_throws_html=saving_throws_html+", "+array_data.name;
                        }

                    })

                    $('#saving_throws_summary').html("<b>Saving Throws:</b> "+saving_throws_html);
                },
                error: function () {
                    alert('AJAX call error');
                }
            }
        );
    }
    function save_submit()
    {
        // going to have to build the form again and submit
        document.getElementById("form1").submit();
    }
</script>


