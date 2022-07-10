<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="{{asset('js/routes.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#inputSearch').on('keyup',function(){
        $inputSearch = $(this).val();
        if($inputSearch==''){
            $('.searchResult').show();
        }else{
            $.ajax({
                method:"post",
                url:'search',
                data: JSON.stringify({
                    inputSearch:$inputSearch
                }),
                headers:{
                    'Accept':'application/json',
                    'Content-Type':'application/json'
                },
                success:function(data){
                    var searchResultAjax='';
                    data = JSON.parse(data);
                    console.log(data);
                    $('.searchResult').show();
                    for(let i=0;i<data.length;i++){
                        searchResultAjax += `
                        <article class="portfolio-item pf-media pf-`+data[i].nama+`" id="portfolio" >
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="feature-box media-box">
                                        <div class="fbox-media">
                                            <div class="portfolio-image">
                                                <img src="img/`+data[i].gambar+`" style="width:100%;height:250px;" class="card-img-top img-thumbnail">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </article>`
                    }
                    $('.searchResult').html(searchResultAjax);
                },
            })
        }
    })
</script>


