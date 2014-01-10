"Basic stuff
filetype on
filetype off
set rtp+=~/.vim/bundle/vundle
call vundle#rc()
syntax on
let mapleader=','
set t_co=256
set background=dark
set cursorline
set nocompatible
filetype plugin indent on

"Bundles 
Bundle 'gmarik/vundle'
Bundle 'vim-airline'
Bundle 'nerdtree'
Bundle 'mru.vim'
Bundle 'AutoClose'
Bundle 'The-NERD-Commenter'
Bundle 'surround.vim'
Bundle 'tacahiroy/ctrlp-funky'
Bundle 'ctrlp.vim'
Bundle 'snipMate'
Bundle 'Rename'
Bundle 'Syntastic'

"Plugin custom settings
let MRU_Max_Entries=20
let MRU_Max_Menu_Entries=10
let NERDTreeShowBookmarks=1
let NERDTreeIgnore=['\.pyc', '\~$', '\.swo$', '\.swp$', '\.git', '\.hg', '\.svn', '\.bzr']
let NERDTreeQuitOnOpen=1
let NERDTreeChDirMode=2
let NERDTreeMouseMode=2
let NERDTreeShowHidden=1
let NERDTreeKeepTreeInNewTab=1
let g:airline_left_sep = '⮀'
let g:airline_right_sep = '⮂'
let g:ctrlp_extensions = ['funky']
let g:airline_theme = "badwolf"

set backup
set swapfile
set undofile
set backupdir=~/.vim/.vimbackup//
set directory=~/.vim/.vimswap//
set undodir=~/.vim/.vimundo//
set tags=./tags,tags;$HOME

set incsearch
set showmatch
set smartcase
set ignorecase
set hlsearch
set hidden

set showcmd
set ruler
set visualbell noerrorbells t_vb=
set autowrite

set backspace=indent,eol,start

set number
set linebreak

set laststatus=2

set autoindent
set smartindent
set shiftwidth=4
set showmode
set virtualedit=onemore 
set expandtab                   
set tabstop=4                   
set softtabstop=4               
set shiftround

set timeout
set timeoutlen=300
set ttimeoutlen=100

set wildmenu
set wildmode=full

"mappings and my custom settings
colorscheme badwolf

imap jj <esc>
nnoremap mm :MRU<esc>
nnoremap ne :NERDTreeToggle<esc>
"nnoremap ,cd :cd %:p:h<cr>:pwd<cr>
nnoremap j gj
nnoremap k gk

nnoremap sh :!
nnoremap so :source $MYVIMRC<esc>
nnoremap pp "*p<esc>
nnoremap :cd :cd %:p:h

"movement in insert mode
imap ,a <esc>A
imap ,i <esc>I
imap ,b <esc>bi
imap ,w <esc>wwi

map <C-f> :CtrlPFunky<esc>
nmap ,t :!clear && phpunit %<cr>
nnoremap <F12> :exec ':!google-chrome %'<CR>



"Some experiments
"function example with input
"function! A()
    "let namespace = input("namespace name is: ")
    "let class = input("class name is: ")
    "let method = input("method name is: ")
    "exec "normal i" . namespace . class . method 
                    "\ method
"endfunction

"command for function calling
"command! C :call A()
"abbrev
"iabbrev id class
"autocommands
"autocmd FileType php syntax off

"go to last position in a file
if has("autocmd")
     autocmd BufReadPost *
     \ if line("'\"") > 0 && line ("'\"") <= line("$") |
     \   exe "normal g`\"" |
     \ endif
   endif
