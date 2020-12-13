<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrów
	 */
    public function getParams() {
        $this->form->loanAmount = isset($_REQUEST ['loanAmount']) ? $_REQUEST ['loanAmount'] : null;
        $this->form->loanYears = isset($_REQUEST ['loanYears']) ? $_REQUEST ['loanYears'] : null;
        $this->form->interest = isset($_REQUEST ['interest']) ? $_REQUEST ['interest'] : null;
    }
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->loanAmount ) && isset ( $this->form->loanYears ) && isset ( $this->form->interest ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
    if ($this->form->loanAmount == null) {
        $this->msgs->addError('Nie podano kwoty pożyczki');
    }

    if ($this->form->loanYears == null) {
        $this->msgs->addError('Nie podano okresu trwania (w latach) pozyczki');
    }

    if ($this->form->interest == null) {
        $this->msgs->addError('Nie podano stopy oprocentowania');
    }

    return !$this->msgs->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
    public function process() {
        $this->getparams();

        if ($this->validate()) {
            $this->result->result = ($this->form->loanAmount+($this->form->loanYears*($this->form->interest/100)))/($this->form->loanYears * 12);
            $this->msgs->addInfo('Kreydt obliczony');
        }
        $this->generateView();
    }
	
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView() {
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Przykład 05');
		$smarty->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC.');
		$smarty->assign('page_header','Obiekty w PHP');
				
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/CalcView.html');
	}

}
