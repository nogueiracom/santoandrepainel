//Hora
var myDate = new Date();

/* Exibir de manhã */
if ( myDate.getHours() < 12 )
{
    document.getElementById('msg').innerHTML = 'Bom dia!';
}
else  /* Exibir de tarde (até as 17:59 pm) */
if ( myDate.getHours() >= 12 && myDate.getHours() <= 17 )
{
    document.getElementById('msg').innerHTML = 'Boa tarde!';
}
else  /* Exibir após as 18hrs */
if ( myDate.getHours() > 17 && myDate.getHours() <= 24 )
{
    document.getElementById('msg').innerHTML = 'Boa noite!';
}
else  /* Caso não indentifique a hora */
{
    document.write("I'm not sure what time it is!");
}


// document.write("<br /><br /> The hour is: ")
// document.write( myDate.getHours() );

//# sourceMappingURL=app.js.map
