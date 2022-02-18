$(function (){
    $('#estu_programa').on('change', onSelectProgramaEstudio);
});

function onSelectProgramaEstudio(){
    
    var id_programa_plan = $(this).val();
    
    $.get('/programa/'+id_programa_plan+'/selectivoplan', function (data){
        var html_select = '<option value="">Seleccione plan</option>';
        for(var i=0; i<data.length; ++i)
            html_select += '<option value="'+data[i].id+'">'+data[i].pp_nombre+'</option>';
        $('#estu_programa_plan').html(html_select);
    });

}