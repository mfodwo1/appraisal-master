<div>
    <style>
        .sidebar li:hover a::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 4px;
            background: linear-gradient(to bottom, #00FFFF, #008080); /* Gradiente cyan */
        }

        .sidebar li:hover a i,
        .sidebar li:hover a span {
            color: white;
        }

    </style>

    <!-- Sidebar -->
        <div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-white h-full text-gray-600 transition-all duration-300 border-none z-10 sidebar">
            <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                <ul class="flex flex-col py-4 space-y-1">
                    <li class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-cyan-500 text-gray-600 hover:text-gray-800 border-l-4 border-transparent  cursor-pointer">
                            <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-home"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Personal Details</span>
                    </li>
                    <li>
                        <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-cyan-500 text-gray-600 hover:text-gray-800 border-l-4 border-transparent">
                            <!-- Icono Check Circle de Font Awesome -->
                            <span class="inline-flex justify-center items-center ml-4">
                  <i class="fas fa-check-circle"></i>
                </span> <span class="ml-2 text-sm tracking-wide truncate">Autorizaciones</span>
                        </a>
                    </li>

                    <li>
                        <a wire:navigate href="{{ route('user.list') }}" data-component="appraiser-details" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-cyan-500 text-gray-600 hover:text-gray-800 border-l-4 border-transparent">
                            <!-- Icono Check Circle de Font Awesome -->
                            <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-check-circle"></i>
                        </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Appraisee List</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-cyan-500 text-gray-600 hover:text-gray-800 border-l-4 border-transparent">
                            <!-- Icono Users de Font Awesome -->
                            <span class="inline-flex justify-center items-center ml-4">
                  <i class="fas fa-users"></i>
                </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-cyan-500 text-gray-600 hover:text-gray-800 border-l-4 border-transparent">
                            <!-- Icono Store de Font Awesome -->
                            <span class="inline-flex justify-center items-center ml-4">
                  <i class="fas fa-store"></i>
                </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Comercios</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-cyan-500 text-gray-600 hover:text-gray-800 border-l-4 border-transparent">
                            <!-- Icono Sign Out de Font Awesome -->
                            <span class="inline-flex justify-center items-center ml-4">
                  <i class="fas fa-sign-out-alt"></i>
                </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Cerrar Sesión</span>
                        </a>
                    </li>
                </ul>
                <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2021</p>
            </div>
        </div>


    </div>

