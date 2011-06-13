/* Author: 
 * Vicol
*/

function resizeTheShuffle()
{
    var wsize = $(window).height() - 30;
    $('#shuffleCont').css({ 'width' : '100%', 'height' : wsize+'px'});    
}
function userThinks(site_id, what_he_thinks, do_or_not)
{
    if(!do_or_not)
    {
        if (what_he_thinks == 'edu')
            myel = $(".thisIsEdu > span");
        else
            myel = $(".thisIsFun > span");
        x=parseInt(myel.html());
        myel.text(x + 1);
        $.ajax({
            url: "/edu/index.php/site/user_thinks/" + site_id + "/" + what_he_thinks
        });
    }
}
$(window).load(function() {

    $('.selectInterests select').simpleMultiSelect();
    $('.shMenu select').simpleMultiSelect({
        classesOnly : true, 
        pseudoSelect : 'custom-select-box', 
        selected : 'custom-select',
        unselected : 'custom-unselect',
        disabled : 'custom-disabled',
        optgroup : 'custom-optgroup',
        optgroupLabel : 'custom-optgroup-label'
    });
    $('.toggleMenu').click(function(){
        if ( $('.shuffleMenu').height() == 30)
            $('.shuffleMenu').animate({
                height: 200
            }, 1000);
        else
            $('.shuffleMenu').animate({
                height: 30
            }, 1000);
    });

    resizeTheShuffle();
    $(window).bind('resize', function() {
        resizeTheShuffle();
    });
});
