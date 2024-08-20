<?php
namespace App\Http\Controllers;

use App\Models\Member;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    protected $queryMessage = 'An error occurred while querying the database.';

    public function index(){
        return view('index');
    }


    public function getEmployeData(Request $request){
        try {
            $post = $request->all();
            $data = Member::listemploye($post);
            

            $array = [];
            
            foreach ($data as $index => $row) {
                $image = asset('/images/no-image.png');
                if (!empty($row->image) && file_exists(public_path('/storage/images/' . $row->image))) {
                    $image = asset('/storage/images') .'/' . $row->image;
                }
                $array[$index] = [
                    "id" => $row->id,
                    "name" => $row->name,
                    "description" => $row->description,
                    "date" => $row->date,
                    "image" => '<img src="' . $image . '" height="30px" width="30px" alt=" '.' image"/>',
                    
                    "action" => '
                        <button class="edit-btn btn btn-primary" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#addMemberModal">Edit</button> 
                        <button class="delete-btn btn btn-danger" data-id="' . $row->id . '">Delete</button>'
                ];
            }

            $recordsTotal = count($data);
            $recordsFiltered = $recordsTotal;
        } catch (Exception $e) {
            $array = [];
            $recordsTotal = 0;
            $recordsFiltered = 0;
        }

        return response()->json([
            "draw" => $post['draw'],
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $array
        ]);

    }

    

    public function save(Request $request)
    {
        try {
            $post = $request->all();
            $type = 'success';
            $message = 'Records saved successfully';

            DB::beginTransaction();

            // Handle file upload
            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');
            //     $imageName = time().'.'.$image->getClientOriginalExtension();
            //     $image->move(public_path('images'), $imageName); // Save the image to the public/images directory
            //     $post['image'] = 'images/'.$imageName; // Save the path in the database
            // }

            $result = Member::saveData($post);
            if (!$result) {
                throw new Exception('Could not save record', 1);
            }

            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            $type = 'error';
            $message = 'Database error: ' . $e->getMessage();
        } catch (Exception $e) {
            DB::rollBack();
            $type = 'error';
            $message = $e->getMessage();
        }

        return response()->json(['type' => $type, 'message' => $message]);
    }

    

    public function delete(Request $request)
    {
        try {
             
            $type = 'success';
            $message = "Record deleted successfully";
            $post = $request->all();
            DB::beginTransaction();
            if (!Member::deleteEmploye( $post)) {
                throw new Exception("Record could not be deleted");
            }

            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            $type = 'error';
            $message = 'Database error: ' . $e->getMessage();
        } catch (Exception $e) {
            DB::rollBack();
            $type = 'error';
            $message = $e->getMessage();
        }

        return response()->json(['type' => $type, 'message' => $message,]);
    }

    public function form(Request $request)
    {
        try {
            $post = $request->all();
            $prevPost = [];
            if (!empty($post['id'])) {
                $prevPost = Member::where('id', $post['id'])
                    ->where('status', 'Y')
                    ->first();
                if (!$prevPost) {
                    throw new Exception("Couldn't found details.", 1);
                }
            }
            $data = [
                'prevPost' => $prevPost
            ];
            $data['type'] = 'success';
            $data['message'] = 'Successfully get data.';
        } catch (QueryException $e) {
            $data['type'] = 'error';
            $data['message'] = $this->queryMessage;
        } catch (Exception $e) {
            $data['type'] = 'error';
            $data['message'] = $e->getMessage();
        }
        return view('form', $data);
    }

}