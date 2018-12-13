@isset($posts)
 @foreach($posts as $post)
          <div class="post-content">

            <!--Post Date-->
            <div class="post-date hidden-xs hidden-sm">
            <h5><img src="https://images.tcdn.com.br/img/img_prod/460618/natal_gourmet_93_1_20161208150229.jpg" 
            class="profile-photo-md" alt="post-image"
            class="img-responsive post-image">  {{$usuario->nome}} </h5>
            <p class="post-text">  {{ $post->created_at }}</p>
            </div><!--Post Date End-->


        <script>
        $('#contactform').submit(function(e) {
            e.preventDefault();
            const mensagem = $('textarea[name="mensagem"]').val();
            $.ajax({
                url: 'sendemail.php', // caminho para o script que vai processar os dados
                type: 'POST',
                data: {mensagem: mensagem},
                success: function(response) {
                    $('#resp').html(response);
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
            return false;
        });
        </script>

            <div class="post-container">
                    <img src="https://images.tcdn.com.br/img/img_prod/460618/natal_gourmet_93_1_20161208150229.jpg" alt="" class="profile-photo-md" alt="post-image" class="img-responsive post-image"> 
                    <div class="post-detail">
                        <div class="user-info">
                        <h5><a href="https://hypescience.com/wp-content/uploads/2015/12/natal-e-tristeza.jpg" class="profile-link">{{$usuario->nome}}</a> <span class="following">Seguindo</span></h5>
                        <p class="text-muted">{{ $post->created_at }}</p>
                        </div>
                        <div class="reaction">
                        <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                        <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                        </div>
                        <div class="line-divider"></div>
                        <div class="post-text">
                        <p class="post-text">{{ $post->post }}</p> <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                        </div>
                        <div class="line-divider"></div>
                        <div class="post-comment">
                        <img src="#" alt="" class="profile-photo-sm">
                        <p><a href="3" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                        </div>
                        <div class="post-comment">
                        <img src="#" alt="" class="profile-photo-sm">
                        <p><a href="#" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                        </div>
                        <div class="post-comment" id="alterar">
                        <img src="#" alt="" class="profile-photo-sm">
                        <input type="text" class="form-control" placeholder="Post a comment">
                        <a href="/profile/editarpost/{{$post->post_id}}" class="btn btn-primary pull-right" >Editar</a>
                        <a href="/profile/deletepost/{{$post->post_id}}" class="btn btn-primary pull-right" >Excluir</a>
                        <button type="submit " class="btn btn-primary pull-right" style="background-color: #149AC9; ;color: #fff; margin-bottom: 0">Publicar</button>
                        <input type="hidden" value="{{ Session::token() }}" name="_token">

                        </div>
                    </div>
                    </div>
            </div>

      @endforeach
      @endisset