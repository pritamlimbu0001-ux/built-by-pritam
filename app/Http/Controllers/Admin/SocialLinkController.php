<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SocialLinkController extends Controller
{
    public function index(): View
    {
        $links = SocialLink::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.social-links.index', compact('links'));
    }

    public function create(): View
    {
        return view('admin.social-links.create', ['link' => new SocialLink(['active' => true])]);
    }

    public function store(Request $request): RedirectResponse
    {
        SocialLink::create($this->validated($request));

        return redirect()->route('admin.social-links.index')
            ->with('status', 'Social link added.');
    }

    public function edit(SocialLink $socialLink): View
    {
        return view('admin.social-links.edit', ['link' => $socialLink]);
    }

    public function update(Request $request, SocialLink $socialLink): RedirectResponse
    {
        $socialLink->update($this->validated($request));

        return redirect()->route('admin.social-links.index')
            ->with('status', 'Social link updated.');
    }

    public function destroy(SocialLink $socialLink): RedirectResponse
    {
        $socialLink->delete();

        return redirect()->route('admin.social-links.index')
            ->with('status', 'Social link deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'platform'   => ['required', 'string', 'max:50'],
            'url'        => ['required', 'url', 'max:255'],
            'icon'       => ['nullable', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer'],
            'active'     => ['nullable', 'boolean'],
        ]) + [
            'active' => $request->boolean('active'),
            'sort_order' => $request->input('sort_order', 0),
        ];
    }
}
