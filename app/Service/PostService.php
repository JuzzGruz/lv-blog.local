<?php
namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function Store($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) 
            {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if ( array_key_exists('preview_image', $data)) 
            {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if ( array_key_exists('main_image', $data))
            {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post = Post::Create($data);

            if (isset($tagIds)) 
            {
                $post->tags()->attach($tagIds);
            }

            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
    }

    public function Update($data, $post)
    {
        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) 
            {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if ( array_key_exists('preview_image',$data))
            {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if ( array_key_exists('main_image',$data)) 
            {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post->update($data);

            if (isset($tagIds)) 
            {
                $post->tags()->attach($tagIds);
            }

            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}

?>