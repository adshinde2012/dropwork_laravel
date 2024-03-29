@extends('teacher/base_teacher')

@section('content')
    <div data-spy="scroll"  data-offset="0">
        <div class="card shadow my-4 mx-auto" style="width: 40%;">
            <h4 class="card-header text-center text-info border border-info mt-2 mx-2">Reject Solution</h4>
            <form method="POST" class="register-form" id="register-form">
                @csrf
                <div class="form-group">
                    <label class="text-info mx-3 mt-3">Reason</label>
                    <textarea required type="text" class="form-control border-info col-md-10 bg-white mx-3" name="message" id="message" rows="4" placeholder="Enter reason for reject solution" ></textarea>
                </div>
                <div class="form-group form-button">
                    <div class="row">
                        <input type="submit" name="signup" id="signup" class="btn btn-info mt-2" value="Submit" style="margin-left: 30px;"/>
                        
                        <a class="btn btn-secondary mt-2 ml-3" href="/view_solution" role="button">Cancel</a>
                        <input class="form-control" style="display: none;" id="solu_id" name="solu_id" value="{{$solution[0]->sol_id}}">
                    </div>
                    
                </div>
            </form>
        </div>

    </div>

    @stop
</body>