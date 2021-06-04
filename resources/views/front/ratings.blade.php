@extends('front.layouts..master')
@section('content')
    <div class="profile-home">
      <div class="content">
          <h3> التقيمات</h3>
          <h1>ابو عدنان السوري</h1>
      </div>
</div>

  <div class="rating-container">
    <div class="rating-main">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 my-3">
            <h1>أبو عدنان السوري</h1>
            <a href="mailto:aboadnan9562@gmail.com">
              aboadnan9562@gmail.com
            </a>
            <div class="lines">
                <div class="line-1"></div>
                <div class="line-2"></div>
            </div>
            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn  btn-block text-right" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <span>
                        <i class="fas fa-exclamation-circle"></i>
                        جوده الشغل
                      </span>
                      <i class="fas fa-minus"></i>
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    <p>
                      لقد تم تقييم جوده الشغل من قبل 51 من العملاء
                      خلال الفتره الأخيره
                    </p>
                    <span>
                      <i class="fas fa-star"></i>
                      4.5
                    </span>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-right collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <span>
                        <i class="fas fa-exclamation-circle"></i>
                        السعر مقابل الشغل
                      </span>
                      <i class="fas fa-minus"></i>
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    <p>
                      لقد تم تقييم جوده الشغل من قبل 51 من العملاء
                      خلال الفتره الأخيره
                    </p>
                    <span>
                      <i class="fas fa-star"></i>
                      4.5
                    </span>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-right collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <span>
                        <i class="fas fa-exclamation-circle"></i>
                        تقييمك لمقدم الشغل
                      </span>
                      <i class="fas fa-minus"></i>
                    </button>
                  </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    <p>
                      لقد تم تقييم جوده الشغل من قبل 51 من العملاء
                      خلال الفتره الأخيره
                    </p>
                    <span>
                      <i class="fas fa-star"></i>
                      4.5
                    </span>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-6 my-3">
           <img src="./images/ddd.png" alt="">
        </div>
        </div>
      </div>
    </div>

    <div class="comments">
      <div class="container">
        <div class="header-center">
          <h1>بعض مهام شغل </h1>
          <h3>بعض التعليقات  </h3>
          <div class=" lines-vertical">
            <div class="line-1"></div>
            <div class="line-2"></div>
        </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="accordion" id="accordionExample-2">
              <div class="card">
                <div class="card-header" id="commentOne">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-right" type="button" data-toggle="collapse" data-target="#collapseCommentOne" aria-expanded="true" aria-controls="collapseCommentOne">
                      <span>
                        <img src="./images/Mask Group 15.png" alt="">
                       <span>
                         عمله جميل جداا <br />
                               تجربة اكتر من رائعه
                       </span>
                      </span>
                      <i class="fas fa-minus"></i>
                    </button>
                  </h2>
                </div>
                <div id="collapseCommentOne" class="collapse show" aria-labelledby="commentOne" data-parent="#accordionExample-2">
                  <div class="card-body">
                    <form action="">
                      <input type="text" placeholder="أكتب تعليق...">
                    </form>
                    <span>
                      35 دقيقة
                    </span>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="commentTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-right collapsed" type="button" data-toggle="collapse" data-target="#collapseCommentTwo" aria-expanded="false" aria-controls="collapseCommentTwo">
                      <span>
                        <img src="./images/Mask Group 15.png" alt="">
                       <span>
                         عمله جميل جداا <br />
                               تجربة اكتر من رائعه
                       </span>
                      </span>
                      <i class="fas fa-minus"></i>
                    </button>
                  </h2>
                </div>
                <div id="collapseCommentTwo" class="collapse" aria-labelledby="commentTwo" data-parent="#accordionExample-2">
                  <div class="card-body">
                    <form action="">
                      <input type="text" placeholder="أكتب تعليق...">
                    </form>
                    <span>
                      35 دقيقة
                    </span>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="commentThree">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-right collapsed" type="button" data-toggle="collapse" data-target="#collapseCommentThree" aria-expanded="false" aria-controls="collapseCommentThree">
                      <span>
                        <img src="./images/Mask Group 15.png" alt="">
                       <span>
                         عمله جميل جداا <br />
                               تجربة اكتر من رائعه
                       </span>
                      </span>
                      <i class="fas fa-minus"></i>
                    </button>
                  </h2>
                </div>
                <div id="collapseCommentThree" class="collapse" aria-labelledby="commentThree" data-parent="#accordionExample-2">
                  <div class="card-body">
                    <form action="">
                      <input type="text" placeholder="أكتب تعليق...">
                    </form>
                    <span>
                      35 دقيقة
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 my-3">
            <img src="./images/ddd.png" alt="">
         </div>
        </div>
      </div>
    </div>
  </div>





  </section>



  <a href="#" class="scrolltop active">
    <i class="fas fa-angle-up"></i>
  </a>


  @stop
