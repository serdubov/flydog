<?php
//Панель администратора
// session_start();
// if(!$_SESSION['auth']){ //Если не прошла авторизация, то переносит на форму авторизации
//     header("Location: ./auth.php");
// }
require_once("connection.php");
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка".mysqli_error($link));
$select_contacts = mysqli_query($link, "SELECT * from contacts") or die("Error".mysqli_error($link));
$select_hide = mysqli_query($link, "SELECT * from hide_page") or die("Error".mysqli_error($link));
$arr_hide = array();
$row = mysqli_fetch_array($select_contacts);
$i=0;
while($row_hide = mysqli_fetch_array($select_hide)){
    $arr_hide[$row_hide["page"]]=$row_hide["status"];
    $arr_hide[$i]=$row_hide["status"];
    $i++;
}
$arr_hide = json_encode($arr_hide);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="icon" href=​img/favicon.ico type="image/x-icon" />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/script.js"></script>

    <!-- <script src="news/adm_news.js"></script>  -->
    <title>Панель администратора</title>
</head>
<body>

<div class="block-menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu">
                            <nav class="menu-links">
                                <div class="menu-item "><a href="panel.php" class="menu-links-item ">Панель</a></div>
                                <div class="menu-item "><a href="news/adm_news.php" class="menu-links-item ">Мероприятия</a></div>
                                <div class="menu-item "><a href="team/adm_team.php" class="menu-links-item ">Инструктора</a></div>
                                <div class="menu-item "><a href="attainment/adm_attainment.php" class="menu-links-item ">Достижения</a></div>
                                <div class="menu-item "><a href="photo/index.php" class="menu-links-item ">Фотоальбом</a></div>
                            </nav>
                            <div class="menu-icon">
                                <label></label>
                                <label></label>
                                <label></label>
                                <label></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="functional">
        <div class="menu-admin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="admin-contacts">
                            <h2 class="adm-head-h2">Контакты</h2>
                            <p class="adm-text-p">Отредактировать контакты</p>
                            <hr>
                            <form class="admin-form" action="update_contacts.php" method="POST">
                                <label class="adm-text-p" for="adm_company">Название организации</label><br>
                                <textarea type="text" class="form-control" id="adm_company" name="adm_company"><?php echo $row["name"];?></textarea>
                                
                                <label class="adm-text-p" for="adm_phone">Телефон</label><br>
                                <input type="text" class="form-control" id="adm_phone" name="adm_phone" value="<?php echo $row["phone"];?>">

                                <label class="adm-text-p" for="adm_email">Mail</label><br>
                                <input type="email" class="form-control" id="adm_email" name="adm_email" value="<?php echo $row["mail"];?>">

                                <label class="adm-text-p" for="adm_addres">Адрес</label><br>
                                <input type="text" class="form-control" id="adm_addres" name="adm_addres" value="<?php echo $row["addres"];?>">

                                <label class="adm-text-p" for="adm_time">Часы работы</label><br>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label class="adm-text-p" for="adm_time_work" style="font-weight: bold;">В будни</label><br>
                                        <input type="number" class="form-control" id="adm_time_work" name="adm_time_work" value="<?php echo $row["time_work"];?>">
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="adm-text-p" for="adm_time_half" style="font-weight: bold;">В сокращенные дни</label><br>    
                                        <input type="number" class="form-control" id="adm_time_half" name="adm_time_half" value="<?php echo $row["time_half"];?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="checkbox" class="weekend_check" id="weekend_pn" name="weekend_pn">
                                    <label class="weekend_label" for="weekend_pn">Пн</label>

                                    <input type="checkbox" class="weekend_check" id="weekend_vt" name="weekend_vt">
                                    <label class="weekend_label" for="weekend_vt">Вт</label>

                                    <input type="checkbox" class="weekend_check" id="weekend_sr" name="weekend_sr">
                                    <label class="weekend_label" for="weekend_sr">Ср</label>

                                    <input type="checkbox" class="weekend_check" id="weekend_cht" name="weekend_cht">
                                    <label class="weekend_label" for="weekend_cht">Чт</label>

                                    <input type="checkbox" class="weekend_check" id="weekend_pt" name="weekend_pt">
                                    <label class="weekend_label" for="weekend_pt">Пт</label>

                                    <input type="checkbox" class="weekend_check" id="weekend_sb" name="weekend_sb">
                                    <label class="weekend_label" for="weekend_sb">Сб</label>

                                    <input type="checkbox" class="weekend_check" id="weekend_vs" name="weekend_vs">
                                    <label class="weekend_label" for="weekend_vs">Вс</label>
                                </div>
                                    
                            <!-- </form> -->
                            <hr style="margin-top: 40px;">
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="admin-hide">
                            <h2 class="adm-head-h2">Скрыть страницы</h2>
                            <p class="adm-text-p">Выберите страницы, которые нужно скрыть</p>
                            <hr>
                            <div class="block-page">
                                <!-- <form class="admin-form" action="update_contacts.php" method="POST"> -->
                                    <div>
                                        <input type="checkbox" name="hide_news" id="hide_news" class="form-check-input" value="false"><br>
                                        <label class="adm-text-p strike" for="hide_news">Мероприятия</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="hide_team" id="hide_team" class="form-check-input" value="false"><br>
                                        <label class="adm-text-p strike" for="hide_team">Инструктора</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="hide_attainment" id="hide_attainment" class="form-check-input" value="false"><br>
                                        <label class="adm-text-p strike" for="hide_attainment">Достижение</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="hide_over_exposure" id="hide_over-exposure" class="form-check-input" value="false"><br>
                                        <label class="adm-text-p strike" for="hide_over-exposure">Передержка</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="hide_photo" id="hide_photo" class="form-check-input" value="false"><br>
                                        <label class="adm-text-p strike" for="hide_photo">Фотоальбом</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="hide_contacts" id="hide_contacts" class="form-check-input" value="false"><br>
                                        <label class="adm-text-p strike" for="hide_contacts">Контакты</label>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <input class="btn admin-btn" type="submit">
                </form>
            </div>
        </div>
    </div>
</div>
<script> 
    function doHide(arr_hide){
        arrCheck = Array.from($("input[type='checkbox']"));
        for(i in arr_hide){
            if(arr_hide[i]=="false"){
                $(arrCheck[i]).prop('checked', true);
            }
        }
    }
</script>
<?php echo "<script> doHide($arr_hide);</script>";?>
</body>
</html>