<?php

namespace AppBundle\Entity {

    use Doctrine\ORM\Mapping as ORM;


    /**
     * Class somazpost
     * @package AppBundle\Entity
     *
     * @ORM\Entity
     * @ORM\Table(name="Izvestaj")
     */
    class somazpost
    {
        /**
         * @return mixed
         */
        public function getId ()
        {
            return $this->id;
        }
        /**
         * @ORM\Column(type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         *
         */
        protected $id;

        /**
         * @return mixed
         */
        public function getIme ()
        {
            return $this->ime;
        }

        /**
         * @param mixed $ime
         */
        public function setIme ($ime)
        {
            $this->ime = $ime;
        }

        /**
         * @return mixed
         */
        public function getPrezime ()
        {
            return $this->prezime;
        }

        /**
         * @param mixed $prezime
         */
        public function setPrezime ($prezime)
        {
            $this->prezime = $prezime;
        }

        /**
         * @return mixed
         */
        public function getNazivProjekta ()
        {
            return $this->nazivProjekta;
        }

        /**
         * @param mixed $nazivProjekta
         */
        public function setNazivProjekta ($nazivProjekta)
        {
            $this->nazivProjekta = $nazivProjekta;
        }



        /**
         * @return mixed
         */
        public function getAktivnost ()
        {
            return $this->aktivnost;
        }

        /**
         * @param mixed $aktivnost
         */
        public function setAktivnost ($aktivnost)
        {
            $this->aktivnost = $aktivnost;
        }

        /**
         * @return mixed
         */
        public function getUtrosenoVreme ()
        {
            return $this->utrosenoVreme;
        }

        /**
         * @param mixed $utrosenoVreme
         */
        public function setUtrosenoVreme ($utrosenoVreme)
        {
            $this->utrosenoVreme = $utrosenoVreme;
        }



        /**
         * @return mixed
         */
        public function getDatum ()
        {
            return $this->datum;
        }

        /**
         * @param mixed $datum
         */
        public function setDatum ($datum)
        {
            $this->datum = $datum;
        }
        /**
         * @ORM\Column(type="string")
         *
         */
        protected $ime;
        /**
         * @ORM\Column(type="string")
         *
         */
        protected $prezime;
        /**
         * @ORM\Column(type="string")
         *
         */
        protected $nazivProjekta;
        /**
         * @ORM\Column(type="text")
         *
         */
        protected $aktivnost;
        /**
         * @ORM\Column(type="float")
         *
         */
        protected $utrosenoVreme;
        /**
         * @ORM\Column(type="datetime")
         *
         */
        protected $datum;
    }
}
