<?php namespace App\Http\Controllers;

use App\Models\HeardFrom;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return Member::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        return Member::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Member::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $member->update($request->all());

        return $member;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource where id is the full discord id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fullid($id)
    {
        return Member::where('full_discord_id', $id)->get();
    }

    /**
     * Display the specified resource where name is the discord name.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Member::where('name', 'like', '%' . $name . '%')->get();
    }

    /**
     * Display the last time this id was heard from.
     *
     * @param  int $id
     */
    public function heardFrom($id) {
        $member = Member::with('heardFrom')->find($id);

        return $this->getCreatedAt($member);
    }


    /**
     * Set the last time this id was heard from.
     *
     * @param int $id
     *
     */
    public function newHeardFrom(int $id) {
        $member = Member::with('heardFrom')->find($id);

        return $this->getCreatedAt($member);
    }


    /**
     * Set the last time this id was heard from.
     *
     * @param int $id
     *
     */
    public function newHeardFromFullDiscordId(int $id) {
        $member = Member::with('heardFrom')->where('full_discord_id', $id)->first();

        return $this->getCreatedAt($member);
    }

    private function getCreatedAt($member) {
        $lastHeard = $member->heardFrom->sortBy('created_at')->last();

        if(empty($lastHeard)) {
            return response(['message' => 'Not Found'], 204);
        } else {
            $member->heardFrom()->save(new HeardFrom(['member_id' => (int)$member->id, 'user_id' => 1]));

            return $lastHeard->created_at;
        }
    }
}
