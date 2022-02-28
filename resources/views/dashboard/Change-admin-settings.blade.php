<x-layoutdashboard>
    <div id="edit">
        <form action="#" method="POST" class="editSUserInfo disable">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-gray-100 sm:p-6">
                    @csrf
                    <x-form.form-group type="text" label="first name" name="f_name" value="{{auth()->user()->f_name}}"/>
                    <x-form.form-group type="text" label="last name" name="l_name" value="{{auth()->user()->l_name}}" />
                    <x-form.form-group type="email" label="email" name="email" value="{{auth()->user()->email}}"/>
                    <a href="{{ route('dashboard.displayresetpassword')}}"class="reset-passowrd book mt-6 self-end py-2 px-6 cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-indigo-800 bg-indigo-200 hover:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Reset Passowrd</a>
                </div>
                <div class="px-4 py-3 bg-gray-100 text-right sm:px-6">
                    <a href="{{ route('dashboard.index')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"> Back </a>
                    <button type="submit"
                            class="submitEdit inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        // this code for activate save changes on input focus
        document.querySelector('.editSUserInfo').addEventListener('submit', (e) => {
            e.target.classList.contains('disable') && e.preventDefault();
            });
        document.querySelectorAll('.editSUserInfo input').forEach(elem =>{
            elem.addEventListener('focus', (e) => {
                if(e.target.nodeName == 'INPUT'){
                    document.querySelector('.editSUserInfo').classList.remove('disable');
                    document.querySelector('.editSUserInfo .submitEdit').classList.add('enable');
                }else{
                    document.querySelector('.editSUserInfo').classList.add('disable');
                    document.querySelector('.editSUserInfo .submitEdit').classList.remove('enable');
                }
            })
        })
    </script>

    </x-layoutdashboard>
