

{{--:class="{collapsed: isCollapsed}"--}}
{{--@mouseover="isCollapsed = false" @mouseleave="isCollapsed = true"--}}
<div class="main_navigation_container   "  :class="{collapsed: isCollapsed}" >
    <a class="nav_logo_container" href="{{ url('/')}}">
        <img class="logo" src="{{asset('images/logo.png')}}" alt="Moon Telecom Logo" v-show="!isCollapsed" >
        <img class="logo_collapsed" src="{{asset('images/logo_collapsed.png')}}" alt="Moon Telecom Logo" v-show="isCollapsed">
    </a>
    <ul class="nav_items">
        <li class="nav_item_container">
        <a href="{{ url('/')}}" class="nav_item active"  >

                <svg class="icon" version="1.1" viewBox="0 0 460.3 460.3"  ><path d="m230.15 120.94-164.16 135.34c0 0.191-0.048 0.472-0.144 0.855-0.094 0.38-0.144 0.656-0.144 0.852v137.04c0 4.948 1.809 9.236 5.426 12.847 3.616 3.613 7.898 5.431 12.847 5.431h109.63v-109.64h73.097v109.64h109.63c4.948 0 9.236-1.814 12.847-5.435 3.617-3.607 5.432-7.898 5.432-12.847v-137.04c0-0.76-0.104-1.334-0.288-1.707l-164.17-135.34z"/>
                    <path d="m457.12 225.44-62.522-51.962v-116.49c0-2.663-0.856-4.853-2.574-6.567-1.704-1.712-3.894-2.568-6.563-2.568h-54.816c-2.666 0-4.855 0.856-6.57 2.568-1.711 1.714-2.566 3.905-2.566 6.567v55.673l-69.662-58.245c-6.084-4.949-13.318-7.423-21.694-7.423-8.375 0-15.608 2.474-21.698 7.423l-205.28 171.02c-1.903 1.52-2.946 3.566-3.14 6.136-0.193 2.568 0.472 4.811 1.997 6.713l17.701 21.128c1.525 1.712 3.521 2.759 5.996 3.142 2.285 0.192 4.57-0.476 6.855-1.998l197.57-164.74 197.57 164.74c1.526 1.328 3.521 1.991 5.996 1.991h0.858c2.471-0.376 4.463-1.43 5.996-3.138l17.703-21.125c1.522-1.906 2.189-4.145 1.991-6.716-0.195-2.563-1.242-4.609-3.141-6.132z"/></svg>
                <span >Home</span>
            </a>
        </li>
        <li class="nav_item_container">
            <a href="{{ route('connections.index')}}" class="nav_item"  >
                <svg class="icon" version="1.1" viewBox="0 0 1e3 1e3" ><path d="m957.4 736.5c0-64.2-40.9-105.2-104.9-105.2h-567.6-12.5v-13.3-264.9c0-27.2 0.3-54.4-0.2-81.5-0.3-16.9-13.7-30.4-30.2-31.6-16.3-1.1-31 9.8-34.2 25.9-0.9 4.3-0.7 8.8-0.7 13.2-0.1 113.1-0.1 226.2-0.1 339.3v13h-60.8c-59.9 0.1-102 42.1-102.2 101.8-0.1 40.8-0.1 81.5 0 122.3 0.1 59.9 42.1 102.1 101.8 102.1 236.4 0.1 472.8 0.1 709.2 0 60 0 102-41.9 102.2-101.8 0.3-39.9 0.2-79.6 0.2-119.3zm-654.4 90.4c-15.6 0.1-31.3 0-46.9 0s-31.3 0.1-46.9 0c-20-0.2-34.5-13.8-34.6-32.3-0.2-18.6 14.3-32.7 34.1-32.8 31.6-0.2 63.2-0.2 94.8 0 19.8 0.1 34.3 14.3 34.2 32.8-0.2 18.5-14.7 32.2-34.7 32.3zm328.2-0.4c-0.4 19-14.8 33.2-32.9 33-17.7-0.2-31.8-14.2-32.1-32.7-0.3-21.7-0.3-43.5 0-65.2 0.3-18.4 14.6-32.4 32.4-32.4 17.8-0.1 32.2 13.9 32.7 32.2 0.3 10.9 0.1 21.7 0.1 32.6-0.2 10.8 0 21.7-0.2 32.5zm130.4 0.8c-0.6 18.3-14.9 32.3-32.7 32.2s-32.1-14-32.4-32.5c-0.3-21.7-0.3-43.5 0-65.2 0.3-18.5 14.3-32.5 32.1-32.7 18.2-0.2 32.5 14 33 33 0.3 10.9 0 21.7 0 32.6 0.1 10.9 0.3 21.8 0 32.6z"/>
                    <path d="m696.5 285c-0.6 62.5-18.8 132.3-55.5 197.1-8 14.2-21.6 20.9-35.5 18.1-14.3-2.9-25.4-13.7-26-28.7-0.3-7.9 2.5-16.8 6.3-23.9 30.7-56.7 46.4-117 45.2-181.5-1.1-59.8-16.5-115.7-45-168.3-4.1-7.6-7-17.3-6.6-25.8 0.7-14.3 12.3-24.9 26.1-27.5 13.2-2.5 26.8 3.9 34.3 16.8 19.9 34.2 34.5 70.6 44 109 8.5 33.7 12.7 68 12.7 114.7z"/>
                    <path d="m566.1 269.1c-0.5 54.9-12.9 103.6-38.7 148.8-8.5 14.9-23.8 20.9-38.9 16-15-4.9-24.3-19-22.2-34.7 0.7-5.2 3-10.4 5.5-15.1 38.7-74.4 39.1-148.7-0.2-223-10.1-19.1-5.4-38.4 11.4-47.5 17-9.2 35.5-2.7 46 16.4 24.4 44.1 36.6 91.5 37.1 139.1z"/>
                    <path d="m435.5 279.7c-0.6 31.9-12.8 66.8-37.7 97-13.7 16.6-33.7 19.3-48.3 7s-15.5-31.4-2.4-48.1c31-39.2 31-87.1-0.1-126.4-13.1-16.6-12.1-35.8 2.6-48.1 14.4-12 34.1-9.3 47.7 6.5 24.3 28.4 38.2 66.5 38.2 112.1z"/></svg>
                    <span >Connections</span>
                </a>
        </li>
        <li class="nav_item_container">
            <a href=" {{ route('recoveries.index') }} " class="nav_item" >
                <svg class="icon" version="1.1" viewBox="0 0 424.98 424.98"  ><path d="m241.4 282.3c-1.587-1.738-3.595-3.038-5.67-4.121-4.518-2.356-9.459-3.785-14.365-5.075v38.016c7.963-0.9 17.105-3.79 21.286-11.224 1.996-3.551 2.393-7.914 1.58-11.867-0.441-2.142-1.352-4.108-2.831-5.729z"/><path d="m242.6 299.97c0.016-0.027 0.025-0.044 0.042-0.073-0.014 0.024-0.028 0.048-0.042 0.073z"/><path d="m184.01 221.53c-1.369 1.999-2.228 4.27-2.465 6.684-0.237 2.419-0.104 5.11 0.815 7.387 0.875 2.17 2.708 3.772 4.6 5.062 2.123 1.444 4.458 2.572 6.836 3.528 1.995 0.803 4.239 1.571 6.658 2.313v-34.4c-6.111 1.304-12.788 4.088-16.444 9.426z"/><path d="m242.8 299.62c-0.05 0.089-0.104 0.182-0.157 0.28 0.062-0.114 0.111-0.198 0.157-0.28z"/><path d="m243 299.26c0.013-0.024 0.015-0.026 0 0z"/><path d="m234.75 92.469c32.329-27.158 53.931-88.341 40.637-91.017-17.664-3.557-56.022 12.04-74.562 14.788-26.296 3.175-54.936-28.515-71.012-10.851-13.071 14.362 9.371 66.592 44.482 89.346-104.75 51.484-251.99 309.94 4.873 328.69 355.41 25.949 177.44-280.79 55.582-330.96zm30.523 203.83c-1.093 10.076-6.433 19.188-14.415 25.374-8.428 6.532-18.999 9.57-29.502 10.421v11.133c0 2.979-1.301 5.86-3.531 7.832-3.065 2.712-7.569 3.381-11.289 1.667-3.673-1.69-6.086-5.457-6.086-9.499v-12.168c-1.801-0.342-3.589-0.749-5.356-1.234-9.816-2.697-18.921-7.954-25.572-15.732-3.313-3.877-6.014-8.276-7.882-13.025-0.488-1.241-0.923-2.505-1.304-3.783-0.345-1.157-0.701-2.333-0.824-3.539-0.207-2.023 0.194-4.087 1.137-5.889 1.938-3.707 6.022-5.946 10.192-5.574 4.104 0.364 7.701 3.212 8.993 7.124 0.398 1.205 0.668 2.44 1.115 3.632 0.443 1.184 0.978 2.335 1.607 3.431 1.242 2.158 2.798 4.148 4.59 5.875 3.694 3.559 8.399 5.872 13.304 7.248v-41.362c-9.591-2.483-19.491-5.69-27.411-11.848-3.849-2.994-7.115-6.714-9.254-11.117-2.257-4.647-3.192-9.824-3.23-14.966-0.039-5.221 0.953-10.396 3.131-15.153 2.04-4.454 4.977-8.453 8.578-11.768 7.7-7.087 17.928-11.04 28.187-12.492v-11.557c0-2.978 1.301-5.86 3.531-7.832 3.066-2.711 7.568-3.381 11.289-1.667 3.672 1.691 6.086 5.457 6.086 9.499v11.494c1.367 0.172 2.73 0.378 4.086 0.624 10.074 1.823 19.927 5.983 27.294 13.246 3.49 3.44 6.347 7.539 8.356 12.009 0.561 1.247 1.052 2.523 1.477 3.824 0.396 1.213 0.794 2.462 0.983 3.728 0.302 2.021-6e-3 4.109-0.871 5.958-1.772 3.788-5.746 6.2-9.927 6.021-4.108-0.179-7.83-2.854-9.301-6.694-0.438-1.142-0.657-2.351-1.104-3.49-0.451-1.153-1.035-2.253-1.708-3.292-1.308-2.02-3.003-3.752-4.938-5.179-4.19-3.094-9.272-4.706-14.35-5.607v39.582c6.035 1.445 12.075 3.021 17.857 5.301 8.739 3.446 17.02 8.73 21.79 17.062-0.74-1.298-1.46-2.563 0.025 0.043 1.458 2.56 0.762 1.34 0.03 0.057 3.795 6.688 5.042 14.685 4.217 22.282z"/><path d="m242.49 300.17c-0.061 0.109-0.114 0.205-0.156 0.278 0.036-0.063 0.09-0.158 0.156-0.278z"/></svg>
                <span> Recoveries </span>
            </a>
        </li>
        <li class="nav_item_container">
            <a href="{{ route('users.index') }}" class="nav_item" >
                <svg class="icon" version="1.1" viewBox="0 0 43.028 43.028"  ><path d="m39.561 33.971-0.145 0.174c-4.774 5.728-11.133 8.884-17.902 8.884-6.77 0-13.128-3.155-17.903-8.884l-0.144-0.174 0.034-0.223c0.922-6.014 4.064-10.845 8.847-13.606l0.34-0.196 0.271 0.284c2.259 2.37 5.297 3.674 8.554 3.674s6.295-1.305 8.554-3.674l0.271-0.284 0.34 0.196c4.783 2.761 7.925 7.592 8.848 13.606l0.035 0.223zm-18.047-12.482c5.924 0 10.744-4.82 10.744-10.744s-4.82-10.745-10.744-10.745-10.744 4.821-10.744 10.744 4.82 10.745 10.744 10.745z"/></svg>
                <span>Users</span>
            </a>
        </li>
        <li class="nav_item_container">
        <a href="{{ route('packages.index')}}" class="nav_item" >
                <svg class="icon" version="1.1" viewBox="0 0 512 512"  ><path d="m91.772 120.96 48.467 26.324 164.72-85.113-42.752-21.502-170.44 80.291zm223.96 317.45 110.91-60.249c3.014-4.666 4.879-9.896 4.879-14.543v-101.56c0-9.526-7.796-13.336-17.342-8.437l-90.323 46.405c-9.526 4.899-17.342 16.738-17.342 26.264v101.54c2e-3 6.592 3.734 10.44 9.217 10.577zm143.38-332.54c5.656 2.216 9.641 7.698 9.641 14.115v260.7h-0.038c-0.02 5.325-2.859 10.497-7.873 13.239l-196.51 106.71v0.018l-0.117 0.06-0.058 0.038-0.058 0.04-0.098 0.078-0.117 0.078-0.115 0.058-0.117 0.058-0.118 0.08-0.115 0.078-0.117 0.058-0.098 0.038-0.018 0.02-0.137 0.078-0.115 0.06-0.04 0.018-0.078 0.04-0.118 0.058-0.233 0.117-0.135 0.058-0.117 0.058-0.135 0.06-0.117 0.038-0.058 0.04-0.058 0.038-0.137 0.04-0.115 0.038-0.04 0.02-0.098 0.04-0.115 0.058-0.137 0.038-0.135 0.04-0.115 0.058-0.098 0.02-0.04 0.02-0.115 0.038-0.137 0.06h-0.058l-0.078 0.038-0.137 0.04-0.135 0.038h-0.02l-0.096 0.04-0.137 0.018-0.115 0.02-0.02 0.02-0.137 0.04-0.135 0.018-0.078 0.04h-0.058l-0.117 0.038-0.135 0.02-0.06 0.02h-0.096l-0.137 0.038-0.27 0.04-0.137 0.038h-0.136l-0.137 0.04h-0.135l-0.058 0.02-0.097 0.02h-0.135l-0.137 0.018-0.018 0.02h-0.252l-0.117 0.02h-0.04l-0.135 0.02h-0.291l-0.137 0.018h-0.29l-0.273 0.02-0.291-0.02h-0.292l-0.135-0.018h-0.293l-0.135-0.02h-0.02l-0.135-0.02h-0.252l-0.02-0.02-0.135-0.018h-0.155l-0.08-0.02-0.058-0.02h-0.135l-0.137-0.04h-0.136l-0.135-0.038-0.137-0.02-0.135-0.02-0.135-0.038h-0.098l-0.04-0.02-0.135-0.02-0.135-0.038h-0.06l-0.078-0.04-0.135-0.018-0.135-0.04-0.02-0.02-0.117-0.02-0.135-0.018-0.117-0.04-0.135-0.038-0.137-0.04-0.078-0.038h-0.058l-0.135-0.06-0.117-0.038-0.038-0.02-0.098-0.02-0.117-0.058-0.135-0.04-0.137-0.038-0.115-0.058-0.098-0.04-0.038-0.02-0.118-0.038-0.117-0.04-0.078-0.038-0.058-0.04-0.135-0.038-0.117-0.06-0.117-0.058-0.115-0.058-0.253-0.117-0.117-0.058-0.078-0.04-0.058-0.018-0.117-0.06-0.115-0.078-0.04-0.02-0.078-0.038-0.116-0.058-0.117-0.078-0.117-0.08-0.115-0.058-0.117-0.058-0.115-0.078-0.117-0.078-0.04-0.04-0.058-0.038-0.115-0.06v-0.018l-196.53-106.71c-5.017-2.741-7.856-7.913-7.873-13.239h-0.04v-260.7c0-6.416 4.005-11.919 9.663-14.115l203.04-95.65 0.02 0.038c4.023-1.905 8.865-1.983 13.161 0.157l189.98 95.456zm-385.6 39.505 51.033 27.721v50.082l37.852 17.69v-47.221l78.464 42.614v226.35l-167.35-90.866v-226.37h1e-3zm106.83 23.678 166.32-85.929 74.401 37.367-165.05 89.661-75.665-41.099z" clip-rule="evenodd"  fill-rule="evenodd"/></svg>
                <span>Packages</span>
            </a>
        </li>
        <li class="nav_item_container">
        <a href="{{ route('villages.index')}}" class="nav_item" >
                <svg class="icon" version="1.1" viewBox="0 0 392.41 392.41"><path d="m94.16 232.66c-1.477 1.476-3.479 2.305-5.567 2.303-2.113 2e-3 -4.139-0.842-5.626-2.343l-68.352-68.414c-3-3.041-6.209-6.222-8.209-9.515v197.87c-0.076 5.483 3.623 10.301 8.94 11.644l112.06 27.955v-192.33l-33.246 32.827z"/><circle cx="89.536" cy="88.67" r="32.07"/><path d="m152.75 27.305c-0.149-0.15-0.298-0.299-0.447-0.447-0.015-0.015-0.029-0.2-0.043-0.21-16.432-16.848-38.959-26.364-62.492-26.398h-0.3c-23.743 0.031-46.488 9.551-63.173 26.442-34.887 34.441-35.075 91.063-0.452 126.14l62.765 62.857 63.735-62.841c34.779-34.554 34.961-90.76 0.407-125.54zm-63.203 109.44c-26.549 1e-3 -48.072-21.522-48.073-48.071v-1e-3c0.03-26.535 21.532-48.039 48.067-48.072h4e-3c26.549-1e-3 48.072 21.522 48.073 48.071s-21.522 48.072-48.071 48.073z"/><path d="m383.48 82.705-103.07-27.15v306.5l97.024 25.9c3.631 0.976 7.508 0.209 10.494-2.076 2.915-2.288 4.577-5.819 4.482-9.524v-282.04c4e-3 -5.447-3.663-10.212-8.928-11.604z"/><path d="m192.85 72.193c1.055 5.841 1.615 11.761 1.674 17.696 0.023 27.911-11.121 54.672-30.948 74.317l-20.17 19.852v208.1l121-30.222v-306.66l-71.556 16.912z"/></svg>
                <span>Villages</span>
            </a>
        </li>
    </ul>

    <div class="nav_footer">
        <a class="nav_item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
            <svg class="icon" version="1.1" viewBox="-243 245 512 512" ><path d="m-72.3 543.7v85.3c0 35.3 28.7 64 64 64h64v21.3c0 23.5 19.1 42.7 42.7 42.7 4.5 0 8.9-0.6 13.2-2l128.4-42.8c17.4-6.1 29.1-22.3 29.1-40.6v-384c0-23.5-19.1-42.7-42.7-42.7-1 0-2 0.4-3.1 0.5-0.8-0.1-1.5-0.5-2.3-0.5h-229.3c-35.3 0-64 28.7-64 64v64c0 11.8 9.5 21.3 21.3 21.3s21.3-9.6 21.3-21.3v-64c0-11.8 9.6-21.3 21.3-21.3h99.4l-6.3 2.1c-17.4 6.1-29.1 22.3-29.1 40.6v320h-64c-11.8 0-21.3-9.6-21.3-21.3v-85.3c0-11.8-9.5-21.3-21.3-21.3s-21.3 9.5-21.3 21.3z"/><path d="m-236.7 473.4 85.3 85.3c6.1 6.1 15.3 7.9 23.2 4.6 8-3.3 13.2-11.1 13.2-19.7v-64h85.3c11.8 0 21.3-9.6 21.3-21.3 0-11.8-9.6-21.3-21.3-21.3h-85.3v-64c0-8.6-5.2-16.4-13.2-19.7s-17.2-1.5-23.2 4.6l-85.3 85.3c-8.4 8.4-8.4 21.9 0 30.2z"/></svg>
            <span>Logout</span>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </a>
    </div>
</div>
@Include('components.nav_toggle_button')

