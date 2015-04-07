<?php namespace App\Http\Controllers;

class LetterController extends Controller {

    public function getAllLetters()
    {
        $letters = Letter::all();

        return View::make('vcms5::admin.letters-all')
            ->with('letters', $letters)
            ->with('page_name', '');
    }

    /**
     * Display Edit or add letter
     *
     * @return mixed
     */
    public function editLetter()
    {
        $id = Input::get('id');

        if ($id > 0)
        {
            $letter = Letter::find($id);
        } else
        {
            $letter = new Letter;
        }

        $image_count = 0;

        if ($letter->pages)
        {
            $image_count = $letter->pages->count();
        }

        $results = Author::where('active', '=', '1')
            ->orderBy('last_name')
            ->get();
        $authors = array();
        $authors[0] = '-';

        foreach ($results as $item)
        {
            $authors[$item->id] = $item->first_name . " " . $item->last_name;
        }

        return View::make('vcms::admin.letter-edit-letter')
            ->with('letter', $letter)
            ->with('letter_id', $id)
            ->with('authors', $authors)
            ->with('image_count', $image_count);
    }


    /**
     * Process Edit or add Writer
     *
     * @return mixed
     */
    public function postEditLetter()
    {
        // other fields
        $id = Input::get('letter_id');

        if ($id > 0)
        {
            $letter = Letter::find($id);
        } else
        {
            $letter = new Letter;
        }

        $letter->letter_name = Input::get('letter_name');
        $letter->author_id = Input::get('author_id');
        $letter->letter_text = Input::get('letter_text');
        $letter->letter_date = Input::get('letter_date');
        $letter->recipient = Input::get('recipient');
        $letter->description = Input::get('description');
        $letter->active = Input::get('active');
        $letter->save();

        $files = Input::file('letter_image');

        if (Input::hasFile('letter_image'))
        {
            $destinationPath = base_path() . '/public/letters/' . $letter->id . '/';
            if (!File::exists($destinationPath))
            {
                File::makeDirectory($destinationPath);
            }

            if (!File::exists($destinationPath . "thumbs"))
            {
                File::makeDirectory($destinationPath . "thumbs");
            }

            $i = 0;
            if ($letter->pages)
            {
                if ($letter->pages->count() > 0)
                {
                    $i = $letter->pages->count();
                }
            }

            foreach ($files as $file)
            {
                $filename = Str::random(20) . "." . $file->getClientOriginalExtension();
                $save_name = $filename;
                $upload_success = $file->move($destinationPath, $filename);
                if ($upload_success)
                {
                    $i = $i + 1;
                    $img = Image::make($destinationPath . $filename);
                    $img->save($destinationPath . $save_name);

                    // make thumbnail
                    $thumb_img = Image::make($destinationPath . $save_name);
                    $thumb_img->resize(150, null, function ($constraint)
                    {
                        $constraint->aspectRatio();
                    });
                    $thumb_img->save($destinationPath . "thumbs/" . $save_name);

                    // update database
                    $page = new LetterDetail;
                    $page->letter_id = $letter->id;
                    $page->sort_order = $i;
                    $page->letter_image = $save_name;
                    $page->save();
                    unset($page);
                }
            }
        }


        return Redirect::to('/admin/letter/all-letters')
            ->with('message', 'Changes saved');
    }


    /**
     * Delete a Letter
     *
     * @return mixed
     */
    public function deleteLetter()
    {
        $id = Input::get('id');
        $letter = Letter::find($id);
        $letter->delete();

        return Redirect::to('/admin/letter/all-letters')
            ->with('message', 'Letter deleted');

    }

    /**
     * Delete an image from a Letter
     *
     * @return mixed
     */
    public function deleteImage()
    {
        $id = Input::get('id');
        $letterDetail = LetterDetail::find($id);
        $letterDetail->delete();

        return Redirect::to('/admin/letter/letter?id=' . Input::get('lid'))
            ->with('message', 'Page deleted');

    }

}
