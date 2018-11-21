                        @foreach($a['goodsImages'] as $image)
                        <div>{{var_dump($image)}}</div>
                        <hr>
                        <div>{{$image['img_id']}}</div>
                        <hr>
                        <div>{{$image['image_url']}}</div>
                        <hr>
                        <hr>
                        @endforeach