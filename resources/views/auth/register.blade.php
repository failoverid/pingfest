<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone Number')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        
        <!-- User Type -->
        <div class="mt-4">
            <x-input-label for="userType" :value="__('Status')" />
            <select id="userType" name="userType" required class="block mt-1 w-full">
                <option value="siswa">Siswa</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="umum">Umum</option>
            </select>
            <x-input-error :messages="$errors->get('userType')" class="mt-2" />
        </div>

        <!-- NISN (Siswa) -->
        <div class="mt-4" id="nisnInput" style="display: none;">
            <x-input-label for="NISN" :value="__('NISN')" />
            <x-text-input id="NISN" class="block mt-1 w-full" type="text" name="NISN" :value="old('NISN')" />
            <x-input-error :messages="$errors->get('NISN')" class="mt-2" />
        </div>

        <!-- School Name (Siswa) -->
        <div class="mt-4" id="schoolNameInput" style="display: none;">
            <x-input-label for="school_name" :value="__('Asal Sekolah')" />
            <x-text-input id="school_name" class="block mt-1 w-full" type="text" name="school_name" :value="old('school_name')" />
            <x-input-error :messages="$errors->get('school_name')" class="mt-2" />
        </div>

        <!-- NIM (Mahasiswa) -->
        <div class="mt-4" id="nimInput" style="display: none;">
            <x-input-label for="NIM" :value="__('NIM')" />
            <x-text-input id="NIM" class="block mt-1 w-full" type="text" name="NIM" :value="old('NIM')" />
            <x-input-error :messages="$errors->get('NIM')" class="mt-2" />
        </div>

        <!-- University Name (Mahasiswa) -->
        <div class="mt-4" id="universityNameInput" style="display: none;">
            <x-input-label for="university_name" :value="__('Nama Universitas')" />
            <x-text-input id="university_name" class="block mt-1 w-full" type="text" name="university_name" :value="old('university_name')" />
            <x-input-error :messages="$errors->get('university_name')" class="mt-2" />
        </div>

        <!-- NIK (Umum) -->
        <div class="mt-4" id="nikInput" style="display: none;">
            <x-input-label for="NIK" :value="__('NIK')" />
            <x-text-input id="NIK" class="block mt-1 w-full" type="text" name="NIK" :value="old('NIK')" />
            <x-input-error :messages="$errors->get('NIK')" class="mt-2" />
        </div>

        <!-- School ID Card (Siswa) -->
        <div class="mt-4" id="schoolIdCardInput" style="display: none;">
            <x-input-label for="student_card" :value="__('Upload Kartu Tanda Sekolah')" />
            <input id="student_card" class="block mt-1 w-full" type="file" name="student_card" />
            <x-input-error :messages="$errors->get('student_card')" class="mt-2" />
        </div>

        <!-- Student ID Card (Mahasiswa) -->
        <div class="mt-4" id="studentIdCardInput" style="display: none;">
            <x-input-label for="university_card" :value="__('Upload Kartu Tanda Mahasiswa')" />
            <input id="university_card" class="block mt-1 w-full" type="file" name="university_card" />
            <x-input-error :messages="$errors->get('university_card')" class="mt-2" />
        </div>

        <!-- Identification Card (Umum) -->
        <div class="mt-4" id="identificationCardInput" style="display: none;">
            <x-input-label for="identification_card" :value="__('Upload Kartu Tanda Identitas')" />
            <input id="identification_card" class="block mt-1 w-full" type="file" name="identification_card" />
            <x-input-error :messages="$errors->get('identification_card')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        // Handle the display of additional fields based on the selected userType
        document.getElementById('userType').addEventListener('change', function() {
            var userType = this.value;
            document.getElementById('nisnInput').style.display = userType === 'siswa' ? 'block' : 'none';
            document.getElementById('schoolNameInput').style.display = userType === 'siswa' ? 'block' : 'none';
            document.getElementById('nimInput').style.display = userType === 'mahasiswa' ? 'block' : 'none';
            document.getElementById('universityNameInput').style.display = userType === 'mahasiswa' ? 'block' : 'none';
            document.getElementById('nikInput').style.display = userType === 'umum' ? 'block' : 'none';

            document.getElementById('schoolIdCardInput').style.display = userType === 'siswa' ? 'block' : 'none';
            document.getElementById('studentIdCardInput').style.display = userType === 'mahasiswa' ? 'block' : 'none';
            document.getElementById('identificationCardInput').style.display = userType === 'umum' ? 'block' : 'none';
        });

        // Trigger change event on page load to set initial visibility
        document.getElementById('userType').dispatchEvent(new Event('change'));
    </script>
</x-guest-layout>
