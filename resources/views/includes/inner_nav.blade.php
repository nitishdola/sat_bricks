 
                            <ul class="nav nav-tabs accent-tabs">
                            <li class="nav-item">
                            <a  class="{{ session()->get('navlink')=="1" ? 'nav-link active show' : 'nav-link' }}" href="{{ route(session()->get('urls1')) }}">{{  session()->get('link1')  }}</a> 
                            </li>
                            <li class="nav-item">
                                <a  class="{{ session()->get('navlink')=="2" ? 'nav-link active show' : 'nav-link' }}"  href="{{ route(session()->get('urls2')) }}">{{  session()->get('link2')  }}</a> 
                            </li>
                            </ul> 
 
  