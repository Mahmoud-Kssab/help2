
<div class="">
    <div class="menu-container">
    </div>

    <div class="menu-btn">
      <div class="btn-line"></div>
      <div class="btn-line"></div>
      <div class="btn-line"></div>
    </div>
    <nav class="menu">
      <ul class="menu-nav">

        <li class="nav-item current">
            <a href="{{route('front.home')}}" class="nav-link">
                الرئيسية
            </a>
        </li>
        @if (auth()->user()->type == 'client')

            <li class="nav-item">
                <a href="{{route('addwork')}}" class="nav-link">
                     الاعلانات
                </a>
            </li>



        @else

            <li class="nav-item">
                <a href="{{route('works.index')}}" class="nav-link">
                    الاعلانات
                </a>
            </li>

        @endif

        <li class="nav-item">
            <a href="{{route('works.index')}}" class="nav-link">
                اتصل بما
            </a>
        </li>

      </ul>
    </nav>

  <header class="header-black">
      <div class="search">
          <i class="fas fa-search"></i>
          <input type="text" class="search-input" placeholder="Search">
         </div>
         <ul class="list-unstyled">
        <li class="active"><a href="{{route('front.home')}}">الرئيسية</a></li>
        @if (auth()->user()->type == 'client')

        <li><a href="{{route('addwork')}}"> الاعلانات</a></li>

        @else
            <li><a href="{{route('works.index')}}"> الاعلانات</a></li>

        @endif

        <li><a href="{{route('contact')}}"> اتصل بنا</a></li>

        <li><a href="{{route('logout')}}"> تسجيل خروج</a></li>


      </ul>


  </header>
