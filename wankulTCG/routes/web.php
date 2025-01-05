<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\LigneDeckController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\RareteController;
use App\Http\Controllers\ArtisteController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes pour les cartes
Route::get('/cards', [CardController::class, 'getAllCards']);
Route::get('/cards/extension/{idExtension}', [CardController::class, 'getCardsBooster']);
Route::get('/cards/price/{idCard}', [CardController::class, 'getPriceCard']);
Route::middleware(['auth'])->get('/user/cards', [CardController::class, 'userCards'])->name('user.cards');


// Routes pour les cartes des clients
Route::get('/client/{idClient}/cards', [CardClientController::class, 'getCardClient']);
Route::get('/client/{idClient}/card/{idCard}', [CardClientController::class, 'getCardByIDCard']);
Route::post('/client/{idClient}/card/{idCard}/add', [CardClientController::class, 'addCardToCollection']);

// Routes pour les clients
Route::post('/register', [UserController::class, 'registerUser']);
Route::post('/connect', [UserController::class, 'connectUser']);
Route::get('/user/{id}', [UserController::class, 'getUserInfo']);
Route::post('/user/{id}/decrease-money/{amount}', [UserController::class, 'decreaseMoney']);
Route::post('/user/{id}/increase-money/{amount}', [UserController::class, 'increaseMoney']);

// Routes pour les decks
Route::get('/client/{idClient}/decks', [DeckController::class, 'getDecksClient']);
Route::post('/client/{idClient}/deck/create', [DeckController::class, 'createDeckClient']);
Route::put('/deck/{idDeck}/name', [DeckController::class, 'updateNomDeck']);
Route::delete('/deck/{idDeck}', [DeckController::class, 'deleteDeck']);

// Routes pour les lignes de deck
Route::get('/deck/{idDeck}/lines', [LigneDeckController::class, 'getAllLigneDeck']);
Route::post('/deck/{idDeck}/line/{idCard}/add', [LigneDeckController::class, 'addLigneDeck']);
Route::put('/deck/{idDeck}/line/{idCard}/increase', [LigneDeckController::class, 'increaseLigneDeck']);
Route::put('/deck/{idDeck}/line/{idCard}/decrease', [LigneDeckController::class, 'decreaseLigneDeck']);
Route::delete('/deck/{idDeck}/line/{idCard}', [LigneDeckController::class, 'deleteLigneDeck']);

// Routes pour les extensions
Route::get('/extensions', [ExtensionController::class, 'getAllExtensions']);

// Routes pour les raretés
Route::get('/raretes', [RareteController::class, 'getAllRarete']);

// Routes pour les artistes
Route::get('/artistes', [ArtisteController::class, 'getAllArtiste']);

// Routes pour l'ouverture de boosters
Route::middleware(['auth'])->get('/booster/list/', [CardClientController::class, 'getBoosterList'])->name('booster.list');
Route::middleware(['auth'])->get('/booster/open/{idExtension}', [CardClientController::class, 'openBooster'])->name('booster.open');

// Routes pour les achats de cartes
Route::middleware(['auth'])->get('/client/market', [CardClientController::class, 'marketBuy'])->name('market');
Route::middleware(['auth'])->post('/client/market', [CardClientController::class, 'buyCard'])->name('market.buy');

require __DIR__.'/auth.php';
