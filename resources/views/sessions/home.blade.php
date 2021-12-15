<?php

//require_once('/var/www/dnd_creator/dnd_creator/resources/api_modules/api_functions.blade.php');
$user_id = Auth::id();
$servername = "157.230.55.156";
$username = "sgraves";
$password = "123Password";
$dbname = "production";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
ddd("Connection failed: " . $conn->connect_error);

}

$no_characters = true;

if(isset($user_id))
    {

        $sql= "Select * from production.characters where user_id = $user_id";

        $result = $conn->query($sql);
//        ddd($result);

        if($result->num_rows >= 1 )
            {
            $no_characters = false;
            $num_rows = $result->num_rows;
            for ($set = array ();
                 $row = $result->fetch_assoc();
                 $set[] = $row);

        }

//        ddd($result->fetch_assoc());
//        ddd($set);
}
else{
    header("Location: http://www.dndcharactercreation.com");
    exit;
}

//    ddd($user_id);
?>
<x-app>
    <x-dashboard_sidebar>

    </x-dashboard_sidebar>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-transparent text-primary bg-dark">
                <div class="card-header">{{ __('My Dashboard') }}</div>

                <div class="card-body">
                        <table class="table text-primary">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Character </th>
                                <th>Alignment </th>
                                <th>Race</th>
                                <th>Class</th>
                                <th>Cha</th>
                                <th>Con</th>
                                <th>Dex</th>
                                <th>Int</th>
                                <th>Str</th>
                                <th>Wis</th>
                                <th>Details</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            {{--                                "id" => "12"--}}
                            {{--                                "user_id" => "5"--}}
                            {{--                                "character_name" => "sttest"--}}
                            {{--                                "alignment" => "Lawful Good"--}}
                            {{--                                "race" => "Gnome"--}}
                            {{--                                "class" => "Bard"--}}
                            {{--                                "cha" => "15"--}}
                            {{--                                "con" => "15"--}}
                            {{--                                "dex" => "12"--}}
                            {{--                                "int" => "12"--}}
                            {{--                                "str" => "10"--}}
                            {{--                                "wis" => "11"--}}
                            {{--                                "prof_id" => null--}}
                            {{--                                "saving_throw_id" => null--}}
                            <tbody>

                            <?php
                                if($no_characters == true){
                                    echo "<span class=\"row justify-content-center\"><h1>No Characters Created</h1></span>";
                                }
                                else{
                                $i=1;
                                foreach ($set as $row)
                                    {
//                                        ddd($row['character_name']);

                                      $char_id =  $row['id'];
                                      $char_name =  $row['character_name'];
                                      $alignment =  $row['alignment'];
                                      $race =  $row['race'];
                                      $class =  $row['class'];
                                      $cha =  $row['cha'];
                                      $con =  $row['con'];
                                      $dex =  $row['dex'];
                                      $int =  $row['int'];
                                      $str =  $row['str'];
                                      $wis =  $row['wis'];

                                        echo
                                        "
                                                                    <tr>
                                <th scope=\"row\">$i</th>
                                <td>$char_name</td>
                                <td>$alignment</td>
                                <td>$race</td>
                                <td>$class</td>
                                <td>$cha</td>
                                <td>$con</td>
                                <td>$dex</td>
                                <td>$int</td>
                                <td>$str</td>
                                <td>$wis</td>
                                <td><button onclick='pull_char_details($char_id)' id=\"$char_id\" type=\"button\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#character_modal\" id=\"char_modal_btn\">Details</button></td>
                                <td><button onclick='delete_char($char_id)' id=\"$char_id\" type=\"button\" class=\"btn btn-primary btn-sm\">Delete</button></td>
                            </tr>
                                        ";
                                        $i++;
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>

    </div>
</div>
    {{--    Details MODAL   --}}
    <div class="modal fade" id="character_modal" tabindex="-1" role="dialog" aria-labelledby="race_modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="character_title">Character Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>`
                </div>
                <div class="modal-body" id = "char_data">

                    <div class="alert alert-primary" role="alert" id="char_name">
                    </div>

                    <div class="alert alert-primary" role="alert" id="alignment">
                    </div>

                    <div class="alert alert-primary" role="alert" id="hit_die">
                    </div>

                    <div class="alert alert-primary" role="alert" id="saving_throws">
                    </div>

                    <div class="alert alert-primary" role="alert" id="race">
                    </div>

                    <div class="alert alert-primary" role="alert" id="class">
                    </div>

                    <div class="alert alert-primary" role="alert" id="speed">
                    </div>

                    <div class="alert alert-primary" role="alert" id="size">
                    </div>

                    <div class="alert alert-primary" role="alert" id="size_description">
                    </div>

                    <div class="alert alert-primary" role="alert" id="age">
                    </div>

                    <div class="alert alert-primary" role="alert" id="proficiencies">
                    </div>

                    <div class="alert alert-primary" role="alert" id="starting_equipment">
                    </div>

                    <div class="alert alert-primary" role="alert" id="languages">
                    </div>

                    <div class="alert alert-primary" role="alert" id="language_desc">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</x-app>

<script>
    function pull_char_details(char_id)
    {
        // var char_id =  toString(char_id);
        console.log(char_id);
        $.ajax(
            {
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:'api_functions',
                data:
                    {
                        function_call:'character_details',
                        data_type: char_id
                    },
                success: function (data) {
                    var details_array = (JSON.parse(data));
                    // alert('Data from the server' + data);
                    console.log(details_array);
                    build_details(details_array)

                },
                error: function () {
                    alert('AJAX call error');
                }
            }
        );
    };

    function delete_char(char_id)
    {
        $.ajax(
            {
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:'delete_character',
                data:
                    {
                        function_call:'delete_character',
                        data_type: char_id
                    },
                success: function (data) {
                    // var alignment_array = JSON.parse(data);
                    console.log(data);
                    location.href = '/home';
                },
                error: function () {
                    alert('AJAX call error');
                }
            }
        )
    }

    function build_details(char_detail_object)
    {
        $.each(char_detail_object, function(key, value){
            switch(key)
            {
                case "character_name":

                    $("#char_name").html("Character Name: " + value);
                    break;

                case "hit_die":
                    $("#hit_die").html("Hit Die: " + value);
                    break;

                case "size_description":
                    $("#size_description").html("Size Description: " + value);
                    break;

                case "saving_throws":
                    var st_array =[];
                    $.each(char_detail_object.saving_throws, function(array_id, st_value){
                        st_array.push(st_value.attribute);
                        console.log(st_value);
                    });
                    var st_string = st_array.join(",");
                    $("#saving_throws").html("Saving Throws: " + st_string);
                    break;


                case "proficiencies":
                    var prof_id = document.getElementById('proficiencies');
                    prof_id.innerHTML="Proficient Skills:"
                    var ul = document.createElement('ul')
                    $.each(char_detail_object.proficiencies, function(array_id, prof_object){
                        var li = document.createElement('li');
                        li.innerHTML=prof_object.skill;
                        ul.append(li);
                        prof_id.append(ul);

                        // console.log(prof_object);
                    });
                    break;

                case "starting_equipment":
                    var equip_id = document.getElementById('starting_equipment');
                    equip_id.innerHTML="Starting Equipment:"
                    var ul = document.createElement('ul')
                    $.each(char_detail_object.starting_equipment, function(array_id, equip_object){
                        // console.log(equip_object.equipment.name);

                        var li = document.createElement('li');
                        li.innerHTML=equip_object.equipment.name;
                        ul.append(li);
                        equip_id.append(ul);


                    });
                    break;

                default:
                    $("#"+key).html(key.charAt(0).toUpperCase()+key.slice(1)+": "+value);
            }
        });
    }
</script>