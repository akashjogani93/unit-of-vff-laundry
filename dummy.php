<script>
                                $('.myclass').click(function(){
                                $(this).prop('checked') ?
                                $('.showin').append(`<input id="${$(this).val()}input" style="display:block;margin:5px" placeholder="${$(this).val()} Quntity"></input>`) :
                                $(`form #${$(this).val()}input`).remove();
                                
                                var kk = document.getElementById(`${$(this).val()}input`).value;
                                alert(kk);

                                });
                            </script>