from rest_framework import serializers

from minigolfs.models import Minigolf

class MinigolfSerializer(serializers.ModelSerializer):
    class Meta:
        model = Minigolf
        fields = '__all__'
