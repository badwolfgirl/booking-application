<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/countryStateDropdown.js"></script>
<script type="text/javascript">

  $(document).ready(function() {
		$("#second,#reviewSide").hide();		
		$("#people, #room, #setup").attr("disabled", "disabled");		

		$("#event").change(function() {
				$("#first").show();
				$("#people,#room,#setup").val("");		
				$("#people,#room,#setup").attr("disabled", "disabled");	
				$("#second,#reviewSide").hide();		
				runAjax($(this),$("#people"));
				$("#rightImg").attr('src', 'images/dining_wh.jpg');
				$("#first").find(".header1").html('How many guests will be attending your event?');
		});
		$("#people").change(function() {
				$("#room, #setup").val("");		
				$("#room, #setup").attr("disabled", "disabled");	
				$("#reviewSide").hide();	
				runJson($(this),$("#room")); // Value, Next Step Object
				$("#first").hide();
				$("#midImg").attr('src', 'images/rooms/defaultMidSec.jpg'); 
				$("#second").find(".header2").html('Select your Room.');
				$("#second").show();
		});
		$("#room").change(function() {
				$("#setup").val("");	
				$("#setup").attr("disabled", "disabled");	
				$("#reviewSide").hide();	
				runJson($(this),$("#setup")); // Value, Next Step Object
				$("#second").show();
				$("#second").find(".header2").html('Select your Room Layout.');
		});
		$("#setup").change(function() {
				var evnt	= $('#event').val();
				var ppl 	= $('#people').val();
				var room 	= $('#room').val();
				var set 	= $('#setup').val();
				runFinalJson($(this),evnt,ppl,room,set);	 // Value, chosen event, people, chosen room, chosen setup
				$("#second").hide();
				$("#reviewSide").find("#roomImg img").attr('src', 'images/rooms/'+ room +'.jpg');
				$("#reviewSide").find("#rmLayout img").attr('src', 'images/rooms/'+ room +'/final'+ set +'.jpg');
				$("#reviewSide").show();
		});
		
  });
  function runAjax(currStep, nextStep){ // this ajax runs attempt 1
    $.ajax({
        type: "POST",
        url: "controller.php",		
        data: currStep.serialize() + "&step="+currStep.attr("id"),
        success: function(msg){   
          if(nextStep!=null){
            nextStep.html(msg); 
            nextStep.removeAttr("disabled"); 
          } 
        },
        error: function(msg){
          alert('ajax Failed'); 	
        }
    });
  }
  function runJson(currStep, nextStep){ // this ajax runs attempt 2++ 
    $.ajax({
        type: "POST",
        url: "controller.php",
        async: true, 
        dataType: "json",
        //contentType: "application/json; charset=utf-8",
        data: currStep.serialize() + "&step="+currStep.attr("id"),
        success: function(data,b,c,d){ 
          //alert(data[2]);
          if(nextStep!=null){
            nextStep.html(data[0]); 
            nextStep.removeAttr("disabled"); 
            $("#btm").html(data[1]);
          }
        },
        error: function(msg){ // I want to see the rest of the ca
          alert('json Failed');
        }
    });
  }
  function runFinalJson(currStep,e,p,r,s){
    $.ajax({
        type: "POST",
        url: "controller.php",
        dataType: "json",
        //contentType: "application/json; charset=utf-8",
        data: "step="+currStep.attr("id")+"&event="+e+"&room="+r+"&setup="+s,
        success: function(data){
          $("#reviewSide").find("#fnlEvent").html(data["eNm"]);		
          $("#reviewSide").find("#fnlPeople").html(p);
          $("#reviewSide").find("#fnlRoom").html(data["rNm"]);
          $("#reviewSide").find("#fnlSetup").html(data["sNm"]);
          $("#reviewSide").find("#rmSize").html(data["rSize"]);
          $("#reviewSide").find("#rmArea").html(data["rArea"]);
          $("#reviewSide").find("#rmCeil").html(data["rCeil"]);
					
					
          $("#finalSteps").find("#eventHid").val(data["eNm"]);		
          $("#finalSteps").find("#peopleHid").val(p);
          $("#finalSteps").find("#roomHid").val(data["rNm"]);
          $("#finalSteps").find("#setupHid").val(data["sNm"]);

        },
        error: function(msg){
          alert('json Failed');
        }
    });
  }
  function imgSwap(type, rID, sID){
    if(type == "room"){
      $("#midImg").attr('src', 'images/rooms/midSec'+ rID +'.jpg'); 
    }
    if(type == "setup"){
      $("#midImg").attr('src', 'images/rooms/'+ rID +'/'+ sID +'.jpg');
    }
  }
  function imgSelect(type, rID, sID){
    if(type == "room"){
      $("#room").val(rID); 
      $("#setup").val("");	
			$("#setup").attr("disabled", "disabled");	
      $("#reviewSide").hide();	
      runJson($("#room"),$("#setup")); // Value, Next Step Object
			$("#second").show();
			$("#second").find(".header2").html('Select your Room Layout.');			
    }
    if(type == "setup"){
      $("#setup").val(sID); 
      var evnt	= $('#event').val();
      var ppl 	= $('#people').val();
      var room 	= $('#room').val();
      var set 	= $('#setup').val();
      runFinalJson($("#setup"),evnt,ppl,room,set);	 // Value, chosen event, people, chosen room, chosen setup
      $("#second").hide();
      $("#reviewSide").find("#roomImg img").attr('src', 'images/rooms/'+ room +'.jpg');
      $("#reviewSide").find("#rmLayout img").attr('src', 'images/rooms/'+ room +'/final'+ set +'.jpg');
      $("#reviewSide").show();
    }
  }
	
	
</script>