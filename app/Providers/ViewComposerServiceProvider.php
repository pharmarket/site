<?php namespace App\Providers;
use App\Models\Experience\Category\Model as ExperienceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function boot(Request $request) {
		$this->changeLocaleUrl($request);
	}

	public function register() {}

	protected function changeLocaleUrl($request) {
		$segments = $request->segments();
		$segments[0] = '%s';
    
		// Give siteLocale variable to all views.
		view()->share('changeLocaleUrl', implode('/', array_map('urldecode', $segments)));
	}
}
