$(document).ready(function(){$("#registros").DataTable({responsive:!0,lengthChange:!1,autoWidth:!1,language:{paginate:{next:"Siguiente",previous:"Anterior",last:"Último",first:"Primero"},info:"Mostrando _START_ a _END_ de _TOTAL_ de resultados",emptyTable:"No hay registros",infoEmpty:"0 registros",search:"Buscar"},buttons:["copy","csv","excel","pdf","print","colvis"]}).buttons().container().appendTo("#registros_wrapper .col-md-6:eq(0)"),$(function(){$("#fecha").datepicker({dateFormat:"yy-mm-dd"})}),$(function(){$(".categoria").select2({placeholder:"Selecciona una categoría",allowClear:!0}),$(".ponente").select2({placeholder:"Seleccione un ponente",allowClear:!0})}),$("#icono").iconpicker(),$(".iconpicker-item").on("click",function(e){e.preventDefault()}),$(function(){var o=$("#regalo").get(0).getContext("2d");$.getJSON("servicio-regalos.php",function(e){console.log(e);var a=e[0],t=e[1];let r=[];for(let e=0;e<t.length;e++)r[e]=function(){for(str="#",i=0;i<6;i++){switch(randNum=(e=0,a=15,Math.floor(Math.random()*(a-e+1)+e)),randNum){case 10:randNum="A";break;case 11:randNum="B";break;case 12:randNum="C";break;case 13:randNum="D";break;case 14:randNum="E";break;case 15:randNum="F"}str+=randNum}var e,a;return str}();a={labels:a,datasets:[{data:t,backgroundColor:r}]};new Chart(o,{type:"doughnut",data:a,options:{maintainAspectRatio:!1,responsive:!0}})})})});