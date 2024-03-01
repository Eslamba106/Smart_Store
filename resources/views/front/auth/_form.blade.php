<div class="form-group">
    <x-form.input name="name" type="text" placeholder="Name" label="Enter Your Name" /> 
    {{-- @error('name')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
    @enderror --}}
</div>
<div class="form-group">
    <x-form.input name="email" type="email" placeholder="enter your email" label="Enter Your Email" /> 
</div>
<div class="form-group">
    <x-form.input name="username" type="text" placeholder="enter your user name" label="Enter Your User Name" /> 
</div>
<div class="form-group">
    <x-form.input name="password" type="password" placeholder="enter your password" label="Enter Your Password" /> 
</div>
<div class="form-group">
    <x-form.input name="image" type="file" placeholder="enter your image" label="Enter Your Image" accept="image/*" /> 
</div>
{{-- <button type="submit" class="grey">Create Account</button> --}}
<div class="search">
<div><button type="submit" class="grey">Create Account</button></div>
</div>
{{-- @if ($errors->any())
<div class="alert alert-danger">
    <h3>Error Occured!</h3>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach    
    </ul>    
</div>    
@endif --}}