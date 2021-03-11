<?php

session_start();

require_once "pdo.php";

if(isset($_POST['search'])){
if(isset($_POST['discipline'])&&$_POST['discipline']!="")
{

}
else{

    header('Location: filter.php');
    return;

}
}

?>


<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" />
    <link href="css/maiin.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" rel="stylesheet" />


  </head>
  <body>


    <div class="s008">
      <form method="post">

        <div class="inner-form ">

          <div class="advance-search">
<h1 style="color:white;">Filters</h1>
            <span class="desc">Advanced Search</span>
            <div class="row">
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="discipline">
                    <option placeholder="" value="">Disciplines</option>
                    <option value=1>CMPN</option>
                    <option value=2>INFT</option>
                    <option value=3>EXTC</option>
                    <option value=4>ETRX</option>
                    <option value=5>BIOMED</option>
                    <option value=6>Jhaadu par udna</option>
                    <option value=7>Jaadu karna</option>
                    <option value=8>Commerce</option>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="loco">
                    <option placeholder="" value="" >Location</option>
                    <option value="USA">USA</option>
                    <option value="UK">UK</option>
                    <option value="INDIA">INDIA</option>



                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="fee">
                    <option placeholder="" value="">Tuition fee</option>
                    <option value=10000>Till 10,000 (USD)</option>
                    <option value=20000>Less than 20,000 (USD)</option>
                    <option value=30000>Less than 30,000 (USD)</option>
                    <option value=40000>Less than 40,000 (USD)</option>
                    <option value=50000>Less than 50,000 (USD)</option>

                  </select>
                </div>
              </div>
            </div>
            <div class="row second">
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="dura">
                    <option placeholder="" value="">Duration</option>
                    <option value="1 Years">1 year</option>
                    <option value="1 & 1/2 Years">1 & 1/2 years</option>
                    <option value="2 Years">2 years</option>
                    <option value="3 Years">3 years</option>
                    <option value="4 Years">4 years</option>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="format">
                    <option placeholder="" value="">Format</option>
                    <option>Full Time</option>
                    <option>Part Time</option>

                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="attendance">
                    <option placeholder="" value="">Attendance</option>
                    <option>On-Campus</option>
                    <option>Online</option>
                    <option>Hybrid</option>
                  </select>
                </div>
              </div>








            </div>






<div class="row second">
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="degree">
                    <option placeholder="" value="" >Degree Type</option>
                    <option value=1>M.B.A</option>
                    <option value=2>B.E</option>
                    <option value=3>B.Tech</option>
                    <option value=4>B.Sc</option>
                    <option value=5>MS</option>
                    <option value=6>Masters in Magic</option>


                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select data-trigger="" name="owner">
                    <option placeholder="" value=""> Ownership</option>
                    <option value="GOVERNMENT">Government</option>
                    <option value="PRIVATE">Private</option>

                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">

                </div>
              </div>
            </div>








 <div class="row third">
              <div class="input-field">

                <div class="group-btn">
                  <button class="btn-delete" id="delete" name="reset">Reset</button>
                <input type="submit" name="search" value="Search" class="btn-search">
                </div>
              </div>
            </div>
          </div>
        </div>










        <h2 class="mb-4" style="text-align:center; Color:white;
  bottom: 20px;
  right: 20px;
  background-color:	  #001a33
;
  color: white;

"><b>Result</b></h2>



<style>

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 17px;

  width: 100px;
height:40px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>




<?php


if(isset($_POST['search'])){


  $queryfilter="SELECT course.coid,course.dsid,course.did,course.cid,course.cotutionfee,course.coduration,college.cid,college.ccountry,college.cownership,college.cdesc,college.cphoto,college.cname
  FROM course JOIN college ON course.cid=college.cid

  WHERE";


  if(isset($_POST['discipline'])&&$_POST['discipline']!="")
  {
    $queryfilter=$queryfilter." course.dsid=".$_POST['discipline'];
  }


  if(isset($_POST['loco'])&&$_POST['loco']!="")
  {
    $queryfilter=$queryfilter." AND college.ccountry=".$_POST['loco'];
  }

  if(isset($_POST['fee'])&&$_POST['fee']!="")
  {
    $queryfilter=$queryfilter." AND course.cotutionfee<".$_POST['fee'];
  }

  if(isset($_POST['dura'])&&$_POST['dura']!="")
  {
    $queryfilter=$queryfilter." AND course.coduration=".$_POST['dura'];
  }

  if(isset($_POST['degree'])&&$_POST['degree']!="")
  {
    $queryfilter=$queryfilter." AND course.did=".$_POST['degree'];
  }

  if(isset($_POST['owner'])&&$_POST['owner']!="")
  {
    $queryfilter=$queryfilter." AND college.cownership=".$_POST['owner'];
  }
$queryfilter=$queryfilter." ORDER BY coacadrat DESC,cofacrat DESC,coplrat DESC,cosocrat DESC;";


$stmt = $pdo->query($queryfilter);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);



foreach ($rows as $row) {echo

        '<div class="card mb-3" style="max-width: 940px;
  margin: auto;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/'.$row['cphoto'].'.jpg" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">'.$row['cname'].'</h5>
        <p class="card-text">'.$row['cdesc'].'</p>
        <p class="card-text">


<button class="button" style="vertical-align:middle"><span><a href="demo.html?coid='.$row['coid'].'" style="color:white;">Hover </a></span></button>

</p>
      </div>
    </div>
  </div>
</div>';
}
}
?>

      </form>



    </div>



    <script src="js/extention/choices.js"></script>
    <script>
      const customSelects = document.querySelectorAll("select");
      const deleteBtn = document.getElementById('delete')
      const choices = new Choices('select',
      {
        searchEnabled: false,
        removeItemButton: true,
        itemSelectText: '',
      });
      for (let i = 0; i < customSelects.length; i++)
      {
        customSelects[i].addEventListener('addItem', function(event)
        {
          if (event.detail.value)
          {
            let parent = this.parentNode.parentNode
            parent.classList.add('valid')
            parent.classList.remove('invalid')
          }
          else
          {
            let parent = this.parentNode.parentNode
            parent.classList.add('invalid')
            parent.classList.remove('valid')
          }
        }, false);
      }
      deleteBtn.addEventListener("click", function(e)
      {
        e.preventDefault()
        const deleteAll = document.querySelectorAll('.choices__button')
        for (let i = 0; i < deleteAll.length; i++)
        {
          deleteAll[i].click();
        }
      });

    </script>
  </body>
</html>
