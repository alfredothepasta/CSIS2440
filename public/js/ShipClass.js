class Ship {
    Name;
    Speed;
    HardPoints;
    Cargo;
    Cost;
    Image;
    Armor

    constructor(n, s, h, c, co, i) {
        this.Name = n;
        this.Speed = s;
        this.HardPoints = h;
        this.Cargo = c;
        this.Cost = co;
        this.Image = i;
        this.Armor = 100;
    }

    displayShip(divtag) {
        divtag.innerHTML = "";
        var displayString = "<table><tr><td>" + this.Name + '</td></tr>';
        displayString += "<tr><td>" + this.Speed + "</td></tr>";
        displayString += "<tr><td>" + this.HardPoints + "</td></tr>";
        displayString += "<tr><td>" + this.Cargo + "</td></tr>";
        displayString += "<tr><td>" + this.Cost + "</td></tr>";
        displayString += "<tr><td>" + this.Armor + "</td></tr>";
        displayString += "<tr><td><img src='/img/CE11/" + this.Image + "'></td></tr>";
        divtag.innerHTML = displayString;
        return true;
    }
}