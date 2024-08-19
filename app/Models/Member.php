<?php
namespace App\Models;

use App\Http\Controllers\MemberController;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'date', 'image'];

    public static function saveData($post)
    {
        try {
            $dataArray = [
                'name' => $post['name'],
                'description' => $post['description'],
                'date' => $post['date'],
                
            ];
            if (isset($post['image'])) {
                $file = $post['image'];
                $filename = time() . '_' . $file->getClientOriginalName();
                $filepath = $file->storeAs('images', $filename, 'public');
                if (!$filepath) {
                    return false;
                }
                $dataArray['image'] = $filename;
            }

            if (!empty($post['id'])) {
                
                $dataArray['updated_at'] = Carbon::now();
                if (!Member::where('id', $post['id'])->update($dataArray)) {
                    throw new Exception("Couldn't update records");
                }
            } else {
                $dataArray['created_at'] = Carbon::now();
                if (!Member::create($dataArray)) {
                    throw new Exception("Couldn't save records");
                }
            }

            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function listemploye($post)
    {
        try {
            // Modify the query to only select members where status is 'Y'
            return Member::select('id', 'name', 'description', 'date', 'image')
                         ->where('status', 'Y')  // Add this condition
                         ->get();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function getData($post) {
        return Member::where('id', $post)->first();
    }

    public static function deleteEmploye($post)
    {
        try {
            $info = Member::find($post['id']);
            
            if ($info) {
                $info->status = 'N'; 
                if ($info->save()) { 
                    return true;
                }
            }
    
            throw new Exception("Couldn't update the status for record with ID: {$post['id']}");
            
        } catch (Exception $e) {
            throw $e;
        }
    }

}


    



    



