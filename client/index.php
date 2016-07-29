
<html>
<head>
  <title>
    <?php
      echo "Hello";
    ?>
  </title>
</head>
<body>


  <div>
    <h1>First Blog Post - Call, Apply and Bind</h1>
    <div>
      Going to start with Bind.

What bind does is - it attaches a method(from another object) to an object.

 So lets build an object, with a method.

var basketballPlayer = {
     name: “Magic Johnson”,
     careerPts: 17707,
     score: function(points) {
          this.careerPts = this.careerPts + points;
          return this.name + ‘ scored and now has ‘+ this.careerPts + ‘  career points.’;
     }
}

Here is our basketballPlayer object.

Now lets say www want to use that score method for a new player.

Lets create our new player -

var kobe = {
     name: ‘Kobe Bryant’,
     careerPts: 33643,
}

Instead of re-writing our score function why don’t we bind it to our new kobe Object

We start with our method

     basketballPlayer.score

then we bind

     basketballPlayer.score.bind()

we add in our new object

    basketballPlayer.score.bind(kobe)

now we add in our value

     basketballPlayer.score.bind(kobe, 2);

We are going to assign this to a variable.

     var kobeScores = basketballPlayer.score.bind(kobe, 2);

Now everytime Kobe scores we can call our kobeScores() bound function

     kobeScores();
     => ‘kobe scored and now has 33645 career points.'

Call and Apply-

First lets figure out what they do.

Lets say we have a function

var scorePts = function() {
     alert(this.name + ’ scored 2 points!’);
}

This function when called would give us an error(if this.name has not been defined in the context of which this function was called), but… lets use our .call function.

Here is a player object

var kobe = {name: ‘Kobe Bryant’, age: 40}

Lets say went want our kobe Object with a name of “Kobe Bryant” to send out an alert like…”Kobe Bryant scored 2 points!”. We can do that with our scorePts function!

We are going to create a scope with our kobe object and our function scorePts.

First we start with our function

scorePts

then we are going use our .call() to punch them into a scope.

scorePts.call()

and lastly we will insert our object

scorePts.call(kobe)

this will than send out an alert “Kobe Bryant scored 2 points!"

_____________
Now this

scorePts.call(kobe)

and

scorePts.apply(kobe)

are going to do the exact same thing.

Now lets say in our score function we have arguments.

var scorePts = function(points) {
     alert(this.name + ’ scored ‘+ points +' points!’);
}

Great! so we can just...

scorePts.call(kobe, 2)

which will alert

“Kobe Bryant scored 2 points!"

but what if we had a WHOLE BUNCH of arguments like...

var scorePts = function(points, assists, rebounds, steals, blocks, fieldgoals, freethrows) {
     alert(this.name + " scored "+ points +" points!");
     alert(this.name + " has "+ rebounds +" rebounds!");
     alert(this.name + " has "+ assists +" assists!");
     alert(this.name + " has "+ steals +"  steals!");
     alert(this.name + " has "+ blocks +" blocks!");
     alert(this.name + " made "+ fieldgoals +" fieldgoals!");
     alert(this.name + " made "+ freethrows +" freethrows!");
}

We could do...

scorePts.call(kobe, 2, 4 , 5, 2, 1, 19, 10);

but that seems a little confusing...

So instead of using .call we can now use .apply

scorePts.apply(kobe, [2, 4 , 5, 2, 1, 19, 10]);

I know…I know… that doesn’t seem like a big deal.

But when we get into high javascript functionality .apply() becomes more useful.

    </div>
  </div>
</body>
