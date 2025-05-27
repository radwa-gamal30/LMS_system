@extends('base.app')
@section('title', 'choose Payment')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-5 text-secondary">Choose Payment Method</h1>
                <form action="{{ route('enrollments.choose-payment.store') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    {{-- @dd($user, $course) --}}
                    <div class="mb-3">
                        <label for="paid" class="form-label">paid</label>
                        <input type="number" name="paid" id="paid" class="form-control" required>
                        @error('paid')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>   
                        @enderror
                    </div>
                    {{-- remaining is read only course->price - paid --}}
                    <div class="mb-3">
                        <label for="remaining" class="form-label">Remaining</label>
                        <input type="number" name="remaining" id="remaining" class="form-control" value="" readonly>
                        @error('remaining')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>   
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="method" class="form-label">Payment Method</label>
                        <select name="method" id="method" class="form-control" required>
                            <option value="">Select Payment Method</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                            <option value="bank_transfer">Bank Transfer</option>
                        </select>
                        @error('method')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>   
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-styled mx-auto d-block">enroll</button>
                </form>
            </div> 
        </div>
    </div>
    {{-- script to handle the remaining amount calculation --}}
    <script>
        document.getElementById('paid').addEventListener('input', function() {
            const paid = parseFloat(this.value) || 0;
            // const course = {{$course}};
            const coursePrice = {{$course->price}}; 
            const remaining = coursePrice - paid;
            console.log("Paid:", paid, "Remaining:", remaining, "Course Price:", coursePrice);
            document.getElementById('remaining').value = remaining >= 0 ? remaining : 0;
        });
    </script>
    @endsection