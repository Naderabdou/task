<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\MailListRequest;
use App\Repositories\Contract\ArticleRepositoryInterface;
use App\Repositories\Contract\BookRepositoryInterface;
use App\Repositories\Contract\MailListRepositoryInterface;
use App\Repositories\Contract\VideoRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $articleRepository;
    protected $bookRepository;
    protected $videoRepository;
    protected $mailListRepository;

    public function __construct(
        ArticleRepositoryInterface $articleRepository,
        BookRepositoryInterface $bookRepository,
        VideoRepositoryInterface $videoRepository,
        MailListRepositoryInterface $mailListRepository
    ) {
        $this->articleRepository = $articleRepository;
        $this->bookRepository = $bookRepository;
        $this->videoRepository = $videoRepository;
        $this->mailListRepository = $mailListRepository;
    }

    public function index()
    {
        $articles = $this->articleRepository->limitGetWhere(['type' => 'article'], 4, ['column' => 'publish_date', 'dir' => 'DESC'])->get();

        $books = $this->bookRepository->limit(12, ['column' => 'publish_date', 'dir' => 'DESC']);

        $videos = $this->videoRepository->limit(6);

        return view('site.home', compact('articles', 'books', 'videos'));
    }

    public function about()
    {
        $articles = $this->articleRepository->limitGetWhere(['type' => 'article'], 3, ['column' => 'publish_date', 'dir' => 'DESC'])->get();

        $researches = $this->articleRepository->limitGetWhere(['type' => 'research'], 3, ['column' => 'publish_date', 'dir' => 'DESC'])->get();

        $books = $this->bookRepository->limit(3, ['column' => 'publish_date', 'dir' => 'DESC']);

        return view('site.about', compact('books', 'researches', 'articles'))
            ->with('features', json_decode(getSetting('features')->value, true));
    }

    public function mailList(MailListRequest $request)
    {
        $this->mailListRepository->create($request->all());

        return redirect()->back()->with('success', 'تم الاشتراك بنجاح');
    } // end of mailList

    // search
    public function search(Request $request)
    {
        $search = $request->search;

        $articles = $this->articleRepository->search(['id', '>', 0], ['title'], $search);

        $books = $this->bookRepository->search(['id', '>', 0], ['title'], $search);

        // marge all results
        $results = $articles->merge($books);

        return response()->json([
            'status' => 'success',
            'result' => $results,
        ]);
    } // end of search
}
