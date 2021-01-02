<!-- <include src="components/_header.html">Loading...</include> -->
<?php echo $this->element('header'); ?>

<section class="main-body-container">
    <div class="p-4">

        <header class="d-flex justify-content-between align-items-center mb-3">
            <h4>Universities (30)</h4>

            <div class="d-flex align-items-center">
                <!--search bar-->
                <form class="flex-grow-1">
                    <div class="input-group search-box">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5"><path d="M8.25 14.25C11.5637 14.25 14.25 11.5637 14.25 8.25C14.25 4.93629 11.5637 2.25 8.25 2.25C4.93629 2.25 2.25 4.93629 2.25 8.25C2.25 11.5637 4.93629 14.25 8.25 14.25Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.7499 15.7501L12.4874 12.4875" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g>
                                </svg>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search by University name, ID">
                    </div>
                </form>

                <a href="stap-1.html" class="wc-btn-normal">Add University</a>
            </div>
        </header>


        <!--Universities list table-->
        <div class="table-responsive">
            <div class="div-base-table full-width">
                <div class="table-row table-head">
                    <div class="table-col">ID</div>
                    <div class="table-col">Name</div>
                    <div class="table-col">Alias</div>
                    <div class="table-col">URL</div>
                    <div class="table-col text-right">Actions</div>
                </div>

                <div class="table-row">
                    <div class="table-col">ID</div>
                    <div class="table-col">Divinity</div>
                    <div class="table-col">ANU</div>
                    <div class="table-col">divinity.reedgraduations.com.au/</div>
                    <div class="table-col text-right">
                        <div class="dropdown dropdown-default dropdown-text dropdown-icon-item">
                            <button class="dropdown-toggle drop-gray no-bg" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 4C3.105 4 4 3.105 4 2C4 0.895 3.105 0 2 0C0.895 0 0 0.895 0 2C0 3.105 0.895 4 2 4ZM2 6C0.895 6 0 6.895 0 8C0 9.105 0.895 10 2 10C3.105 10 4 9.105 4 8C4 6.895 3.105 6 2 6ZM2 12C0.895 12 0 12.895 0 14C0 15.105 0.895 16 2 16C3.105 16 4 15.105 4 14C4 12.895 3.105 12 2 12Z" fill="#A3ADB9"/>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="">
                                <a class="dropdown-item d-flex" href="#">
                                    <i class="material-icons font-16 mr-2">create</i>
                                    Edit
                                </a>
                                <a class="dropdown-item d-flex" href="#">
                                    <i class="material-icons font-16 mr-2">data_usage</i>
                                    Clear Cache
                                </a>
                                <a class="dropdown-item d-flex" href="#">
                                    <i class="material-icons font-16 mr-2">person</i>
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-col">ID</div>
                    <div class="table-col">Divinity</div>
                    <div class="table-col">ANU</div>
                    <div class="table-col">divinity.reedgraduations.com.au/</div>
                    <div class="table-col text-right">
                        <div class="dropdown dropdown-default dropdown-text dropdown-icon-item">
                            <button class="dropdown-toggle drop-gray no-bg" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 4C3.105 4 4 3.105 4 2C4 0.895 3.105 0 2 0C0.895 0 0 0.895 0 2C0 3.105 0.895 4 2 4ZM2 6C0.895 6 0 6.895 0 8C0 9.105 0.895 10 2 10C3.105 10 4 9.105 4 8C4 6.895 3.105 6 2 6ZM2 12C0.895 12 0 12.895 0 14C0 15.105 0.895 16 2 16C3.105 16 4 15.105 4 14C4 12.895 3.105 12 2 12Z" fill="#A3ADB9"/>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="">
                                <a class="dropdown-item d-flex" href="#">
                                    <i class="material-icons font-16 mr-2">create</i>
                                    Edit
                                </a>
                                <a class="dropdown-item d-flex" href="#">
                                    <i class="material-icons font-16 mr-2">data_usage</i>
                                    Clear Cache
                                </a>
                                <a class="dropdown-item d-flex" href="#">
                                    <i class="material-icons font-16 mr-2">person</i>
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-col">ID</div>
                    <div class="table-col">Divinity</div>
                    <div class="table-col">ANU</div>
                    <div class="table-col">divinity.reedgraduations.com.au/</div>
                    <div class="table-col text-right">
                        <div class="dropdown dropdown-default dropdown-text dropdown-icon-item">
                            <button class="dropdown-toggle drop-gray no-bg" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 4C3.105 4 4 3.105 4 2C4 0.895 3.105 0 2 0C0.895 0 0 0.895 0 2C0 3.105 0.895 4 2 4ZM2 6C0.895 6 0 6.895 0 8C0 9.105 0.895 10 2 10C3.105 10 4 9.105 4 8C4 6.895 3.105 6 2 6ZM2 12C0.895 12 0 12.895 0 14C0 15.105 0.895 16 2 16C3.105 16 4 15.105 4 14C4 12.895 3.105 12 2 12Z" fill="#A3ADB9"/>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="">
                                <a class="dropdown-item d-flex" href="#">
                                    <i class="material-icons font-16 mr-2">create</i>
                                    Edit
                                </a>
                                <a class="dropdown-item d-flex" href="#">
                                    <i class="material-icons font-16 mr-2">data_usage</i>
                                    Clear Cache
                                </a>
                                <a class="dropdown-item d-flex" href="#">
                                    <i class="material-icons font-16 mr-2">person</i>
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-row">
                    <div class="table-col">ID</div>
                    <div class="table-col">Divinity</div>
                    <div class="table-col">ANU</div>
                    <div class="table-col">divinity.reedgraduations.com.au/</div>
                    <div class="table-col text-right">
                        <div class="dropdown dropdown-default dropdown-text dropdown-icon-item">
                            <button class="dropdown-toggle drop-gray no-bg" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 4C3.105 4 4 3.105 4 2C4 0.895 3.105 0 2 0C0.895 0 0 0.895 0 2C0 3.105 0.895 4 2 4ZM2 6C0.895 6 0 6.895 0 8C0 9.105 0.895 10 2 10C3.105 10 4 9.105 4 8C4 6.895 3.105 6 2 6ZM2 12C0.895 12 0 12.895 0 14C0 15.105 0.895 16 2 16C3.105 16 4 15.105 4 14C4 12.895 3.105 12 2 12Z" fill="#A3ADB9"/>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="">
                                <a class="dropdown-item d-flex" href="#">
                                    <i class="material-icons font-16 mr-2">create</i>
                                    Edit
                                </a>
                                <a class="dropdown-item d-flex" href="#">
                                    <i class="material-icons font-16 mr-2">data_usage</i>
                                    Clear Cache
                                </a>
                                <a class="dropdown-item d-flex" href="#">
                                    <i class="material-icons font-16 mr-2">person</i>
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>