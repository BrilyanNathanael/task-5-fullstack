<footer>
    <div class="footer-top d-flex justify-content-around align-items-center">
            <a href="" class="foot-logo text-decoration-none">
                <h4 class="mb-0">Bloog.</h4>
            </a>
            <div class="categories-nav">
                <h5>Categories</h5>
                <div class="categories-footer d-flex pt-2">
                    <?php $count = 0; ?>
                    @foreach($allCategories as $ac)
                        <?php $count++; ?>
                        @if($count == 1)
                        <div class="d-flex flex-column me-5">
                        @endif
                            <a href="/home?category={{$ac->id}}">{{$ac->name}}</a>
                        @if($count == 3)
                        </div>
                        <?php $count = 0; ?>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <hr>
    <p class="text-white text-center">&copy; Created by Brilyan Nathanael Rumahorbo 2022</p>
</footer>