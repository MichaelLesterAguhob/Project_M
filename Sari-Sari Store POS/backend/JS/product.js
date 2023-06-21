
$(document).on('click','#add_prod', function()
{
    let name = $('#prod_name').val();
    let unit_size = $('#prod_unit_size').val();
    let price = $('#prod_price').val();
    let cat = $('#prod_cat').val();
    if(name == "" || unit_size == "" || price == "" || cat == "")
    {
        alert('Fill in the blanks!');
    }
    else
    {
        $.ajax(
            {
                url:'backend/add_product.php',
                method:'post',
                data:{name:name, unit_size:unit_size, price:price, cat:cat},
                success:function(data)
                {
                    $('#msg').text(data).fadeIn(1000).fadeOut(2000);
                    $('#prod_name').val('');
                    $('#prod_unit_size').val('');
                    $('#prod_price').val('');
                    $('#prod_cat').val('');
                    load_prod();
                }
            })
    }
})

load_prod();
function load_prod()
{
    $.ajax(
        {
            url:'backend/load_product.php',
            method:'post',
            success:function(data)
            {
                $('#load_prod').html(data);
            }
        })
}