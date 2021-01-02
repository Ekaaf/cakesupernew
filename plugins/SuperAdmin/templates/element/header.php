<header class="main-header-wrap">
    <div class="d-flex justify-content-between align-items-center">

        <div class="logo">
            <a href="index.html">
                <?= $this->Html->image('/SuperAdmin/assets/images/logo.png', ['alt' => 'CakePHP']);?>
            </a>
        </div>


        <ul class="nav nav-pills text-tablist" role="tablist">
            <li class="nav-item d-flex border-bottom full-width" role="presentation">
                <a class="nav-link d-flex align-items-center" data-toggle="pill" href="#dashboard" role="tab" aria-controls="pills-home" aria-selected="true">
                    <svg class="mr-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.8">
                            <path d="M4 11.5H10V4H4V11.5ZM4 17.5H10V13H4V17.5ZM11.5 17.5H17.5V10H11.5V17.5ZM11.5 4V8.5H17.5V4H11.5Z" fill="#4B4C4C"/>
                        </g>
                    </svg>
                    Dashboard
                </a>
                <a class="nav-link d-flex align-items-center active" data-toggle="pill" href="#university" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <svg class="mr-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                        <path d="M10 2.5L0.625 7.5L10 12.5L19.375 7.5L10 2.5Z" stroke="#0D77A1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.375 9.5V13.75C4.375 15.125 6.875 16.875 10 16.875C13.125 16.875 15.625 15.125 15.625 13.75V9.5" stroke="#0D77A1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.375 7.5V15.625" stroke="#0D77A1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                    University
                </a>
            </li>
        </ul>


        <div class="dropdown dropdown-default dropdown-text dropdown-profile">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButtonProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="avatar mr-2">
                        <?= $this->Html->image('/SuperAdmin/assets/images/avatar.png', ['alt' => 'CakePHP']);?>
                    </span>
                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="1" d="M6 6L0 0L12 0L6 6Z" fill="black"/>
                    </svg>
                </button>

                <div class="dropdown-menu top-arrow dropdown-menu-right" aria-labelledby="dropdownMenuButtonProfile">
                    <div class="dropdown-header d-flex flex-column justify-content-between align-items-center">
                        <span class="avatar mb-2">
                            <?= $this->Html->image('/SuperAdmin/assets/images/avatar.png', ['alt' => 'CakePHP']);?>
                        </span>
                        <h5 class="m-0">Alex Morgan</h5>
                        <p class="m-0">alex@gmail.com</p>
                    </div>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#">My account</a>
                    <a class="dropdown-item" href="#">My account</a>
                    <a class="dropdown-item" href="#">My account</a>
                    <a class="dropdown-item" href="#">My account</a>
                    <a class="dropdown-item" href="#">My account</a>
                </div>
            </div>

    </div>
</header>